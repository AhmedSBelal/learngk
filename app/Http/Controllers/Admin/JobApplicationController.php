<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJobApplicationRequest;
use App\Http\Requests\UpdateJobApplicationRequest;
use App\Models\JobApplication;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JobApplicationController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('job_application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = JobApplication::with(['job'])->select(sprintf('%s.*', (new JobApplication())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'job_application_show';
                $editGate = 'job_application_edit';
                $deleteGate = 'job_application_delete';
                $crudRoutePart = 'job-applications';

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
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('nationality', function ($row) {
                return $row->nationality ? $row->nationality : '';
            });
            $table->editColumn('approve', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->approve ? 'checked' : null) . '>';
            });
            $table->addColumn('job_name', function ($row) {
                return $row->job ? $row->job->name : '';
            });

            $table->editColumn('application_status', function ($row) {
                return $row->application_status ? JobApplication::APPLICATION_STATUS_SELECT[$row->application_status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'approve', 'job']);

            return $table->make(true);
        }

        return view('admin.jobApplications.index');
    }

    public function edit(JobApplication $jobApplication)
    {
        abort_if(Gate::denies('job_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplication->load('job');

        return view('admin.jobApplications.edit', compact('jobApplication'));
    }

    public function update(UpdateJobApplicationRequest $request, JobApplication $jobApplication)
    {
        $jobApplication->update($request->validated());

        return redirect()->route('admin.job-applications.index');
    }

    public function show(JobApplication $jobApplication)
    {
        abort_if(Gate::denies('job_application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplication->load('job');

        return view('admin.jobApplications.show', compact('jobApplication'));
    }

    public function destroy(JobApplication $jobApplication)
    {
        abort_if(Gate::denies('job_application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobApplication->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobApplicationRequest $request)
    {
        JobApplication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('job_application_create') && Gate::denies('job_application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new JobApplication();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
