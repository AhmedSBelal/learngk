<?php

namespace App\Http\Requests;

use App\Models\Enroll;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEnrollRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enroll_edit');
    }

    public function rules()
    {
        return [];
    }
}
