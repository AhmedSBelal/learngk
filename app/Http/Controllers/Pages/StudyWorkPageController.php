<?php

namespace App\Http\Controllers\Pages;

use App\Models\StudyWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudyWorkPageController extends Controller
{
    protected StudyWork $studyWork;
    protected string $lang;

    /**
     * @param StudyWork $studyWork
     */
    public function __construct(StudyWork $studyWork)
    {
        $this->studyWork = $studyWork;
        $this->lang = app()->getLocale();
    }


    public function index(Request $request, string $type)
    {
        $query = $this->studyWork->query()->where('type', $type)->withTranslation()->translatedIn($this->lang);


        if ($request->has('search') && !empty($request->input('search'))) {
            $searchTerm = $request->input('search');
            $query->whereHas('translations', function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('short_description', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        $articles = $query->get();



        if ($articles->count() == 0) {
            return redirect()->route('home');
        }
        
        $setStudyWorkView = session('StudyWorkView', 'grid');
        return view('site.studyworks.studywork-page', compact('articles', 'setStudyWorkView', 'type'));
    }

    public function setStudyWorkeView(Request $request)
    {
        $request->validate([
            'view' => 'required|in:list,grid'
        ]);
        session(['StudyWorkView' => $request->input('view')]);
        return response()->json(['status' => 'success']);
    }


    public function show(StudyWork $studyWork)
    {
        $next = $this->studyWork
            ->where('type', $studyWork->type)
            ->where('id', '>', $studyWork->id)
            ->orderBy('id', 'asc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        $prev = $this->studyWork
            ->where('type', $studyWork->type)
            ->where('id', '<', $studyWork->id)
            ->orderBy('id', 'desc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        $articles = $this->studyWork->query()->withTranslation()->translatedIn($this->lang)->limit(3)->get();

        // dd($articles);

        return view('site.studyworks.studywork-detail-page', compact([
            'studyWork',
            'next',
            'prev',
            'articles'
        ]));
    }
}
