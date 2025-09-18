<?php

namespace App\Http\Controllers\Pages;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\JobStoreRequest;
use App\Models\Job;
use App\Models\JobApplication;
use DB;
use Exception;
use Illuminate\Http\Request;

class JobPageController extends Controller
{
    protected Job $job;
    protected JobApplication $jobApplication;
    protected string $lang;

    /**
     * @param Job $job
     * @param JobApplication $jobApplication
     */
    public function __construct(Job $job, JobApplication $jobApplication)
    {
        $this->job = $job;
        $this->jobApplication = $jobApplication;
        $this->lang = app()->getLocale();
    }

    public function index()
    {
        $jobs = $this->job->where('active', true)->withTranslation()->translatedIn($this->lang)->get();

        if ($jobs->count() == 0) {
            return redirect()->route('home');
        }

        return view('site.jobs.job-page', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('site.jobs.job-detail-page', compact('job'));
    }

    public function sendApplication(JobStoreRequest $request, Job $job)
    {
        DB::beginTransaction();
        try {
            $application = $this->jobApplication->create([
                'name' => $request->name,
                'family_name' => $request->family_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'nationality' => $request->nationality,
                'birthdate' => $request->birthdate,
                'address' => $request->address,
                'status' => $request->status,
                'reach' => $request->reach,
                'approve' => $request->approve,
                'job_id' => $job->id,
                'application_status' => 'pending',
            ]);

            $application->addMedia($request->resume)->toMediaCollection('resume');
            DB::commit();

            Alert::success('Success', 'Your application sent successfully, will contact you as soon as possible')
                ->timerProgressBar();

            return redirect()->route('home');
        } catch (Exception $e) {
            DB::rollBack();

            Alert::error('Error', 'Something went wrong please try again')
                ->timerProgressBar();

            return redirect()->route('jobs.show', $job->slug);
        }
    }
}
