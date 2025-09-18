<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrollStoreRequest extends FormRequest
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
                'max:255'
            ],
            'family_name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'phone' => [
                'required',
                'string',
                'max:255'
            ],
            'birthdate' => [
                'required',
                'date',
            ],
            'course_start' => [
                'required',
                'date'
            ],
            'course_end' => [
                'required',
                'date',
            ],
            'age' => [
                'required',
                'integer',
            ],
            'gender' => [
                'required',
                Rule::in('male', 'female'),
            ],
            'id_card' => [
                'required',
                'string',
                'max:255'
            ],
            'parent_phone' => [
                'required',
                'string',
                'max:255'
            ],
            'nationality' => [
                'required',
                'string',
                'max:255'
            ],
            'address' => [
                'required',
                'string',
                'max:255'
            ],
            'degree' => [
                'required',
                'string',
                'max:255'
            ],
            'job' => [
                'required',
                'string',
                'max:255'
            ],
            'knowledge' => [
                'required',
                'string',
                'max:255'
            ],
            'reach_us' => [
                'required',
                Rule::in('instagram', 'facebook', 'friend', 'website', 'other'),
            ],
            'affiliation_term' => [
                'required',
                'boolean',
            ],
            'withdrawal_term' => [
                'required',
                'boolean',
            ],
            'contract' => [
                'required',
                'boolean',
            ],
        ];
    }
}
