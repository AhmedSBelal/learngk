<?php

namespace App\Http\Controllers\Pages;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;

class ContactPageController extends Controller
{
    public function index()
    {
        return view('site.contact-page');
    }

    public function sendMessage(ContactStoreRequest $request)
    {
        Contact::query()->create($request->validated());

        session()->flash('success', trans('website.global.contact-success'));

        return redirect()->route('contact');
    }
}
