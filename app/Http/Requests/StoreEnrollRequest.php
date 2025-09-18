<?php

namespace App\Http\Requests;

use App\Models\Enroll;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEnrollRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('enroll_create');
    }

    public function rules()
    {
        return [];
    }
}
