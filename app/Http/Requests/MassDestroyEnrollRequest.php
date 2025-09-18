<?php

namespace App\Http\Requests;

use App\Models\Enroll;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEnrollRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('enroll_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:enrolls,id',
        ];
    }
}
