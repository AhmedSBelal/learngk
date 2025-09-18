<?php

namespace App\Http\Requests;

use App\Models\CourseLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreCourseLevelRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_level_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                Rule::unique('course_levels', 'name'),
            ],
            'course_type_id' => [
                'required',
                'integer',
                Rule::exists('course_types', 'id'),
            ],
        ];
    }
}
