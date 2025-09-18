<?php

namespace App\Http\Requests;

use App\Models\CourseLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateCourseLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_level_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                Rule::unique('course_levels', 'name')->ignore($this->course_level),
            ],
            'course_type_id' => [
                'required',
                'integer',
                Rule::exists('course_types', 'id'),
            ],
        ];
    }
}
