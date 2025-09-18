<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobStoreRequest extends FormRequest
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
                'string',
            ],
            'family_name' => [
                'required',
                'string',
            ],
            'email' => [
                'required',
                'email',
            ],
            'phone' => [
                'required',
                'string',
            ],
            'nationality' => [
                'required',
                'string',
            ],
            'birthdate' => [
                'required',
                'date',
            ],
            'address' => [
                'required',
                'string',
            ],
            'status' => [
                'required',
                Rule::in(['single', 'married']),
            ],
            'reach' => [
                'required',
                Rule::in(['phone', 'whatsapp', 'email']),
            ],
            'resume' => [
                'required',
                'file',
                'mime_types:application/pdf',
                'max:7168'
            ],
            'approve' => [
                'accepted',
            ],
        ];
    }
}
