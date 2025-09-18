<?php

namespace App\Http\Requests;

use App\Models\Course;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateCourseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('course_edit');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'string',
                'required',
                Rule::unique('courses', 'slug')->ignore($this->course),
            ],
            'exam_link' => [
                'url',
                'nullable',
            ],
            'type' => [
                Rule::in(['course', 'test']),
                'required',
            ],
            'course_type_id' => [
                'required',
                'integer',
                Rule::exists('course_types', 'id')
            ],
            'course_level_id' => [
                'nullable',
                'integer',
                Rule::exists('course_levels', 'id')
            ],
            'course_attend_type' => [
                'nullable',
                Rule::in(['online', 'presence'])
            ],
            'course_book' => [
                'nullable',
                'string'
            ],
            'participant' => [
                'nullable',
                'numeric'
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'image' => [
                'required',
            ],
            'price' => [
                'nullable',
                'numeric'
            ],
            'from' => [
                'nullable'
            ],
            'to' => [
                'nullable'
            ],
            'active' => [
                'nullable'
            ]
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
                Rule::unique('course_translations', 'name')->ignore($this->course->translate($locale) ? $this->course->translate($locale)->id : $this->course->id),
            ];
            $data[$locale . '.short_description'] = [
                'required',
            ];
            $data[$locale . '.description'] = [
                'nullable',
            ];
            $data[$locale . '.duration'] = [
                'nullable',
                'string',
            ];
            $data[$locale . '.months'] = [
                'nullable',
                'string',
            ];
            $data[$locale . '.days'] = [
                'nullable',
                'string',
            ];
            $data[$locale . '.seo_description'] = [
                'nullable',
                'string'
            ];
            $data[$locale . '.seo_keywords'] = [
                'nullable',
                'string'
            ];
        }

        return $data;
    }
}
