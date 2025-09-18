<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\StudyWork;
use Illuminate\Http\Request;

class SearchPageController extends Controller
{
    protected Course $course;
    protected Article $article;
    protected StudyWork $studyWork;
    protected string $lang;

    public function __construct(Course $course, Article $article, StudyWork $studyWork)
    {
        $this->course = $course;
        $this->article = $article;
        $this->studyWork = $studyWork;
        $this->lang = app()->getLocale();
    }


    public function index(Request $request)
    {
        $courses = $this->course->query()
            ->where('type', 'course')
            ->where('active', true)
            ->withTranslation()
            ->whereTranslationLike('name', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('short_description', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('description', "%{$request->search}%", $this->lang)
            ->get();

        $tests = $this->course->query()
            ->where('type', 'test')
            ->where('active', true)
            ->withTranslation()
            ->whereTranslationLike('name', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('short_description', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('description', "%{$request->search}%", $this->lang)
            ->get();

        $studies = $this->studyWork->query()
            ->where('type', 'study')
            ->withTranslation()
            ->whereTranslationLike('name', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('short_description', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('description', "%{$request->search}%", $this->lang)
            ->get();

        $works = $this->studyWork->query()
            ->where('type', 'work')
            ->withTranslation()
            ->whereTranslationLike('name', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('short_description', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('description', "%{$request->search}%", $this->lang)
            ->get();

        $articles = $this->article->query()
            ->where('publish', true)
            ->withTranslation()
            ->whereTranslationLike('title', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('description', "%{$request->search}%", $this->lang)
            ->orWhereTranslationLike('article', "%{$request->search}%", $this->lang)
            ->get();

        return view('site.search-page', compact([
            'courses',
            'tests',
            'studies',
            'works',
            'articles',
        ]));
    }
}
