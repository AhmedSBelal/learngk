<?php

namespace App\Http\Controllers\Pages;

use Alert;
use App\Events\EnrollCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\EnrollStoreRequest;
use App\Models\Course;
use App\Models\CourseLevel;
use App\Models\CourseType;
use App\Models\Enroll;
use Illuminate\Http\Request;

class CoursePageController extends Controller
{
    protected Course $course;
    protected Enroll $enroll;
    protected string $lang;

    /**
     * @param Course $course
     * @param Enroll $enroll
     */
    public function __construct(Course $course, Enroll $enroll)
    {
        $this->course = $course;
        $this->enroll = $enroll;
        $this->lang = app()->getLocale();
    }

    // public function index(CourseType $courseType, Request $request)
    // {
    //     $courseTypes = CourseType::query()->get();

    //     $courseLevels = CourseLevel::query()->pluck('name');

    //     $current_courses = $this->course->query()
    //     ->where('type', 'course')
    //     ->where('active', true)
    //     ->where('start_date', '<=', now())
    //     ->where('end_date', '>=', now())
    //     ->when($request->input('type'), function ($query) use ($request) {
    //             $query->whereHas('course_type', function ($query) use ($request) {
    //                 $query->where('slug', $request->input('type'));
    //             });
    //         })
    //         ->when($request->input('level'), function ($query) use ($request) {
    //             $query->whereHas('course_level', function ($query) use ($request) {
    //                 $query->where('name', $request->input('level'));
    //             });
    //         })
    //         ->when($request->input('attend'), function ($query) use ($request) {
    //             $query->where('course_attend_type', $request->input('attend'));
    //         })
    //         ->withTranslation()
    //         ->translatedIn($this->lang)
    //     ->get();

    //     $future_courses = $this->course->query()
    //     ->where('type', 'course')
    //     ->where('active', false)
    //     ->where('start_date', '>', now())
    //     ->when($request->input('type'), function ($query) use ($request) {
    //             $query->whereHas('course_type', function ($query) use ($request) {
    //                 $query->where('slug', $request->input('type'));
    //             });
    //         })
    //         ->when($request->input('level'), function ($query) use ($request) {
    //             $query->whereHas('course_level', function ($query) use ($request) {
    //                 $query->where('name', $request->input('level'));
    //             });
    //         })
    //         ->when($request->input('attend'), function ($query) use ($request) {
    //             $query->where('course_attend_type', $request->input('attend'));
    //         })
    //         ->withTranslation()
    //         ->translatedIn($this->lang)
    //     ->get();

    //     $courses = $this->course->query()
    //         ->where('type', 'course')
    //         // ->where('course_type_id', $courseType->id)
    //         ->where('active', true)
    //         ->with('course_level')
    //         ->when($request->input('type'), function ($query) use ($request) {
    //             $query->whereHas('course_type', function ($query) use ($request) {
    //                 $query->where('slug', $request->input('type'));
    //             });
    //         })
    //         ->when($request->input('level'), function ($query) use ($request) {
    //             $query->whereHas('course_level', function ($query) use ($request) {
    //                 $query->where('name', $request->input('level'));
    //             });
    //         })
    //         ->when($request->input('attend'), function ($query) use ($request) {
    //             $query->where('course_attend_type', $request->input('attend'));
    //         })
    //         ->withTranslation()
    //         ->translatedIn($this->lang)
    //         ->paginate(6);


    //     return view('site.courses.course-page1', compact([
    //         'courses',
    //         'current_courses',
    //         'future_courses',
    //         'courseType',
    //         'courseTypes',
    //         'courseLevels',
    //     ]));
    // }

    public function index(Request $request)
    {
        // Get all course types and levels for filtering
        $courseTypes = CourseType::all();
        $courseLevels = CourseLevel::pluck('name');

        // Determine the active course type (query parameter)
        $activeCourseTypeSlug = $request->input('type');
        $level = $request->input('level');
        $attend = $request->input('attend');

        // Base query with conditional filters
        $baseQuery = function ($query) use ($request, $activeCourseTypeSlug, $level, $attend) {
            $query->where('type', 'course');

            // Apply course type filter only if $activeCourseTypeSlug is provided
            if ($activeCourseTypeSlug) {
                $query->whereHas('course_type', function ($q) use ($activeCourseTypeSlug) {
                    $q->where('slug', $activeCourseTypeSlug);
                });
            }

            // Apply level filter only if level is provided
            if ($level) {
                $query->whereHas('course_level', function ($q) use ($level) {
                    $q->where('name', $level);
                });
            }

            // Apply attend type filter only if attend is provided
            if ($attend) {
                $query->where('course_attend_type', $attend);
            }

            $query->with(['course_level', 'course_type'])
                ->withTranslation()
                ->translatedIn($this->lang);
        };

        // Current courses (active and within date range)
        $current_courses = $this->course->query()
            ->where('active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->where($baseQuery)
            ->get();

        // Future courses (active and starting in the future)
        $future_courses = $this->course->query()
            ->where('active', true)
            ->where('start_date', '>', now())
            ->where($baseQuery)
            ->get();

        // Main paginated query
        $courses = $this->course->query()
            ->where('active', true)
            ->where($baseQuery)
            ->paginate(6);

        // Fetch course type only if slug is provided, otherwise set to null
        $courseType = $activeCourseTypeSlug ? CourseType::where('slug', $activeCourseTypeSlug)->first() : null;

        return view('site.courses.course-page1', compact([
            'courses',
            'current_courses',
            'future_courses',
            'courseTypes',
            'courseLevels',
            'courseType',
        ]));
    }

    public function show(Course $course)
    {
        if ($course->type === 'test') {
            return back();
        }

        $next = $this->course->where('course_type_id', $course->course_type_id)
            ->where('type', 'course')
            ->where('id', '>', $course->id)
            ->where('active', true)
            ->orderBy('id', 'asc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        $prev = $this->course->where('course_type_id', $course->course_type_id)
            ->where('type', 'course')
            ->where('id', '<', $course->id)
            ->where('active', true)
            ->orderBy('id', 'desc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        return view('site.courses.course-detail-page', compact([
            'course',
            'next',
            'prev',
        ]));
    }

    public function enrollPage(Course $course)
    {
        if ($course->type === 'test') {
            return back();
        }

        return view('site.courses.course-enroll-page', compact('course'));
    }

    public function enrollStore(EnrollStoreRequest $request, Course $course)
    {
        if ($course->type === 'test') {
            return back();
        }

        $enroll = $this->enroll->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'course_id' => $course->id,
            'family_name' => $request->family_name,
            'birthdate' => $request->birthdate,
            'age' => $request->age,
            'gender' => $request->gender,
            'id_card' => $request->id_card,
            'parent_phone' => $request->parent_phone,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'degree' => $request->degree,
            'job' => $request->job,
            'knowledge' => $request->knowledge,
            'reach_us' => $request->reach_us,
            'affiliation_term' => (boolean) $request->affiliation_term,
            'withdrawal_term' => (boolean) $request->withdrawal_term,
            'contract' => (boolean) $request->contract,
            'course_start' => $request->course_start,
            'course_end' => $request->course_end,
            'status' => 'pending',
        ]);

        $enroll->load('course.translations');
        event(new EnrollCreated($enroll->name, $enroll->email, $enroll->phone, $enroll->course->name, $enroll->id));

        Alert::success(trans('website.global.success'), trans('website.global.course-enroll-success'))
            ->timerProgressBar();

        return redirect()->route('courses', $course->slug);
    }

    public function setCourseView(Request $request)
    {
        $request->validate([
            'view' => 'required|in:list,grid'
        ]);
        session(['courseView' => $request->input('view')]);
        return response()->json(['status' => 'success']);
    }
}
