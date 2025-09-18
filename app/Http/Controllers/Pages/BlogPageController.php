<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Jorenvh\Share\Share;


class BlogPageController extends Controller
{
    protected Article $article;
    protected string $lang;

    /**
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
        $this->lang = app()->getLocale();
    }  
    
    public function index(Request $request)
    {
        $query = $this->article->query()
            ->where('publish', true)
            ->withTranslation() 
            ->translatedIn($this->lang);

        if ($request->has('search') && !empty($request->input('search'))) {
            $searchTerm = $request->input('search');
            $query->whereHas('translations', function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%')
                  ->orWhere('article', 'like', '%' . $searchTerm . '%');
            });
        }

        $articles = $query->get();
        $articleView = session('ArticleView', 'grid'); // Default to grid if not set

        if ($articles->count() == 0) {
            return redirect()->route('home');
        }

        return view('site/blogs/blog-page', compact('articles', 'articleView'));
    }

    public function setArticleView(Request $request)
    {
        $request->validate([
            'view' => 'required|in:list,grid'
        ]);
        session(['ArticleView' => $request->input('view')]);
        return response()->json(['status' => 'success']);
    }
    
    public function show(Article $article)
    {
        $article->withTranslation()
            ->translatedIn($this->lang);

        $next = $this->article
            ->where('id', '>', $article->id)
            ->where('publish', true)
            ->orderBy('id', 'asc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        $prev = $this->article
            ->where('id', '<', $article->id)
            ->where('publish', true)
            ->orderBy('id', 'desc')
            ->withTranslation()
            ->translatedIn($this->lang)
            ->first();

        $social = (new Share)->page(route('articles.show', $article->slug), $article->translate('en')->title)
            ->facebook()
            ->whatsapp()
            ->linkedin()
            ->twitter()
            ->getRawLinks();

        $articles = $this->article->query()
            ->where('publish', true)
            ->where('id', '!=', $article->id)
            ->withTranslation()
            ->translatedIn($this->lang)
            ->take(3)
            ->get();
            

        return view('site/blogs/blog-show-page', compact([
            'article',
            'social',
            'next',
            'prev',
            'articles'
        ]));
    }
}
