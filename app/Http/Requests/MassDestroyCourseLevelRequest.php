<?php

namespace App\Http\Requests;

use App\Models\CourseLevel;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseLevelRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_level_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_levels,id',
        ];
    }
}
