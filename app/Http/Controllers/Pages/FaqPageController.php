<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqPageController extends Controller
{
    protected Faq $faqs;
    protected string $lang;

    /**
     * @param Faq $faqs
     */
    public function __construct(Faq $faqs)
    {
        $this->faqs = $faqs;
        $this->lang = app()->getLocale();
    }


    public function index()
    {
        $faqs = $this->faqs->query()
            ->withTranslation()
            ->translatedIn($this->lang)
            ->get();

        if ($faqs->count() == 0){
            return redirect()->route('home');
        }

        return view('site.faq-page', compact('faqs'));
    }
}
