<?php

namespace App\Http\Requests;

use App\Models\CourseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreCourseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_type_create');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('course_types', 'slug'),
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('course_type_translations', 'name'),
            ];
        }

        return $data;
    }
}
