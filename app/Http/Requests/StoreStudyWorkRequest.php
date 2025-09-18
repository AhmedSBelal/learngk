<?php

namespace App\Http\Requests;

use App\Models\StudyWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreStudyWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('study_work_create');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('study_works', 'slug'),
            ],
            'image' => [
                'required',
            ],
            'type' => [
                'required',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('study_work_translations', 'name'),
            ];
            $data[$locale . '.short_description'] = [
                'required',
            ];
            $data[$locale . '.description'] = [
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
