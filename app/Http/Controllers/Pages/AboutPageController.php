<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index()
    {
        return view('site.about-page1');
    }

    public function privacy()
    {
        return view('site.privacy-page');
    }

    public function terms()
    {
        return view('site.terms-page');
    }
}
