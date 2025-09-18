<?php

namespace App\Http\Requests;

use App\Models\SiteLanguage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSiteLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_language_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:site_languages,name,' . request()->route('site_language')->id,
            ],
            'locale' => [
                'string',
                'required',
                'unique:site_languages,locale,' . request()->route('site_language')->id,
            ],
        ];
    }
}
