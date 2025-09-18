<?php

namespace App\Http\Requests;

use App\Models\Review;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateReviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'email:dns,rfc',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'review' => [
                'required',
            ],
            'user_id' => [
                'nullable',
                Rule::exists('users', 'id'),
            ],
            'status' => [
                'nullable',
            ]
        ];
    }
}
