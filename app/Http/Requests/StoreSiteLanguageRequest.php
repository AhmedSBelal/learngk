<?php

namespace App\Http\Requests;

use App\Models\SiteLanguage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSiteLanguageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('site_language_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:site_languages',
            ],
            'locale' => [
                'string',
                'required',
                'unique:site_languages',
            ],
        ];
    }
}
