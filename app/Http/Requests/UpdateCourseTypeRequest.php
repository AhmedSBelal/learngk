<?php

namespace App\Http\Requests;

use App\Models\CourseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateCourseTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_type_edit');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('course_types', 'slug')->ignore($this->course_type),
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('course_type_translations', 'name')->ignore($this->course_type->translate($locale) ? $this->course_type->translate($locale)->id : $this->course_type->id),
            ];
        }

        return $data;
    }
}
