<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_edit');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'required',
                'string',
                Rule::unique('jobs', 'slug')->ignore($this->job),
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
