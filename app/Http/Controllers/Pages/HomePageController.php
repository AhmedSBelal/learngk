<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\Feature;
use App\Models\Review;
use App\Models\Team;

class HomePageController extends Controller
{
    protected Feature $features;
    protected Article $articles;
    protected Review $reviews;
    protected Course $course;
    protected Team $teams;
    protected string $lang;

    /**
     * @param Feature $features
     * @param Article $articles
     * @param Review $reviews
     * @param Course $course
     * @param Team $teams
     */
    public function __construct(Feature $features, Article $articles, Review $reviews, Course $course, Team $teams)
    {
        $this->features = $features;
        $this->articles = $articles;
        $this->reviews = $reviews;
        $this->course = $course;
        $this->teams = $teams;
        $this->lang = app()->getLocale();
    }


    public function index()
    {
        $features = $this->features->query()
            ->withTranslation()
            ->translatedIn($this->lang)
            ->get();

        $articles = $this->articles->query()
            ->where('publish', true)
            ->withTranslation()
            ->translatedIn($this->lang)
            ->latest()
            ->get();

        $reviews = $this->reviews->query()
            ->where('status', 'accepted')
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $teams = $this->teams->query()
            ->withTranslation()
            ->translatedIn($this->lang)
            ->inRandomOrder()
            ->limit(3)->get();

        $tests = $this->course->query()->where('type', 'test')->with('media')
            ->inRandomOrder()
            ->withTranslation()
            ->translatedIn(app()->getLocale())
            ->limit(10)
            ->get();

        $courses = $this->course->query()->where('type', 'course')->with(['media', 'course_level'])
            ->withTranslation()
            ->translatedIn(app()->getLocale())
            ->latest()
            ->get();

        // $courses = $courses = $this->course->query()
        //     ->where('type', 'course')
        //     ->where('active', true)
        //     ->with('course_level')
        //     ->withTranslation()
        //     ->translatedIn($this->lang)
        //     ->paginate(6);

        return view('site.home-page1', compact([
            'features',
            'articles',
            'reviews',
            'tests',
            'teams',
            'courses',
        ]));
    }
}
