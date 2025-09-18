<?php

namespace App\Http\Requests;

use App\Models\CourseType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCourseTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('course_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:course_types,id',
        ];
    }
}
