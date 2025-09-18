<?php

namespace App\Http\Requests;

use App\Models\StudyWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateStudyWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('study_work_edit');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('study_works', 'slug')->ignore($this->study_work),
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
                Rule::unique('study_work_translations', 'name')->ignore($this->study_work->translate($locale) ? $this->study_work->translate($locale)->id : $this->study_work->id),
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
