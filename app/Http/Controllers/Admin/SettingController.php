<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SettingController extends Controller
{
    use MediaUploadingTrait;

    public $lang;

    public function __construct()
    {
        $this->lang = app()->getLocale();
    }

    public function index(Request $request)
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Setting::query()->withTranslation()->translatedIn($this->lang)->get();
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'setting_show';
                $editGate = 'setting_edit';
                $deleteGate = 'setting_delete';
                $crudRoutePart = 'settings';

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
            $table->editColumn('key', function ($row) {
                return $row->key ? $row->key : '';
            });
            $table->editColumn('text', function ($row) {
                return $row->text ? $row->text : '';
            });
            $table->editColumn('short_description', function ($row) {
                return $row->short_description ? $row->short_description : '';
            });

            $table->editColumn('number', function ($row) {
                return $row->number ? $row->number : '';
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
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });
            $table->editColumn('multi_image', function ($row) {
                if (!$row->multi_image) {
                    return '';
                }
                $links = [];
                foreach ($row->multi_image as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });

            $table->rawColumns(['actions', 'placeholder', 'image', 'file', 'multi_image']);

            return $table->make(true);
        }

        return view('admin.settings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        if ($request->input('image', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($request->input('file', false)) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
        }

        foreach ($request->input('multi_image', []) as $file) {
            $setting->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('multi_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $setting->id]);
        }

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->all());

        if ($request->input('image', false)) {
            if (!$setting->image || $request->input('image') !== $setting->image->file_name) {
                if ($setting->image) {
                    $setting->image->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($setting->image) {
            $setting->image->delete();
        }

        if ($request->input('file', false)) {
            if (!$setting->file || $request->input('file') !== $setting->file->file_name) {
                if ($setting->file) {
                    $setting->file->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($setting->file) {
            $setting->file->delete();
        }

        if (count($setting->multi_image) > 0) {
            foreach ($setting->multi_image as $media) {
                if (!in_array($media->file_name, $request->input('multi_image', []))) {
                    $media->delete();
                }
            }
        }
        $media = $setting->multi_image->pluck('file_name')->toArray();
        foreach ($request->input('multi_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $setting->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('multi_image');
            }
        }

        return redirect()->route('admin.settings.index');
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        Setting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new Setting();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
