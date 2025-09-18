<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_create');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'required',
                'string',
                Rule::unique('jobs', 'slug')
            ],
            'active' => [
                'nullable'
            ]
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
            ];
            $data[$locale . '.description'] = [
                'required',
            ];
        }

        return $data;
    }
}
