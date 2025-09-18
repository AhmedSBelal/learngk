<?php

namespace App\Http\Requests;

use App\Models\Article;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreArticleRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('article_create');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('articles', 'slug'),
            ],
            'image' => [
                'required',
            ],
            'publish' => [
                'nullable'
            ]
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.title'] = [
                'string',
                'required',
                Rule::unique('article_translations', 'title'),
            ];
            $data[$locale . '.description'] = [
                'required',
            ];
            $data[$locale . '.article'] = [
                'required',
            ];
            $data[$locale . '.seo_description'] = [
                'nullable',
            ];
            $data[$locale . '.seo_keywords'] = [
                'nullable',
            ];
        }

        return $data;
    }
}
