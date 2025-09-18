<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStudyWorkRequest;
use App\Http\Requests\StoreStudyWorkRequest;
use App\Http\Requests\UpdateStudyWorkRequest;
use App\Models\StudyWork;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class StudyWorkController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('study_work_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = StudyWork::query()->withTranslation()->translatedIn(app()->getLocale())->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'study_work_show';
                $editGate = 'study_work_edit';
                $deleteGate = 'study_work_delete';
                $crudRoutePart = 'study-works';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : '';
            });
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });
            $table->editColumn('image', function ($row) {
                if ($photo = $row->image) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? StudyWork::TYPE_SELECT[$row->type] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'image']);

            return $table->make(true);
        }

        return view('admin.studyWorks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('study_work_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studyWorks.create');
    }

    public function store(StoreStudyWorkRequest $request)
    {
        $studyWork = StudyWork::create($request->validated());

        if ($request->input('image', false)) {
            $studyWork->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $studyWork->id]);
        }

        return redirect()->route('admin.study-works.index');
    }

    public function edit(StudyWork $studyWork)
    {
        abort_if(Gate::denies('study_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studyWorks.edit', compact('studyWork'));
    }

    public function update(UpdateStudyWorkRequest $request, StudyWork $studyWork)
    {
        $studyWork->update($request->validated());

        if ($request->input('image', false)) {
            if (!$studyWork->image || $request->input('image') !== $studyWork->image->file_name) {
                if ($studyWork->image) {
                    $studyWork->image->delete();
                }
                $studyWork->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($studyWork->image) {
            $studyWork->image->delete();
        }

        return redirect()->route('admin.study-works.index');
    }

    public function show(StudyWork $studyWork)
    {
        abort_if(Gate::denies('study_work_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.studyWorks.show', compact('studyWork'));
    }

    public function destroy(StudyWork $studyWork)
    {
        abort_if(Gate::denies('study_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $studyWork->delete();

        return back();
    }

    public function massDestroy(MassDestroyStudyWorkRequest $request)
    {
        foreach ($request->ids as $id) {
            $studyWork = StudyWork::where('id', $id)->first();
            $studyWork->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('study_work_create') && Gate::denies('study_work_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new StudyWork();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
