<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\Enroll;
use Illuminate\Http\Request;

class TestPageController extends Controller
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

    public function index()
    {
        $courses = $this->course->query()
            ->where('type', 'test')
            ->where('active', true)
            ->withTranslation()
            ->translatedIn($this->lang)
            ->paginate(6);

        if ($courses->count() == 0) {
            return redirect()->route('home');
        }

        return view('site.tests.test-page', compact([
            'courses',
        ]));
    }

    public function show(Course $course)
    {
        if ($course->type === 'course'){
            return back();
        }

        $next = $this->course
            ->where('type', 'test')
            ->where('id', '>', $course->id)
            ->where('active', true)
            ->orderBy('id','asc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        $prev = $this->course
            ->where('type', 'test')
            ->where('id', '<', $course->id)
            ->where('active', true)
            ->orderBy('id','desc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        return view('site.tests.test-show-page', compact([
            'course',
            'next',
            'prev',
        ]));
    }
}
