<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email'
            ],
            'phone' => [
                'required',
                'string',
            ],
            'review' => [
                'required',
                'string'
            ],
            'image' => [
                'sometimes',
                'image',
                'mimes:jpeg,jpg,png'
            ]
        ];
    }

    public function prepareForValidation()
    {
        if ($this->image == null) {
            $this->request->remove('image');
        }
    }
}
