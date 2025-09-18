<?php

namespace App\Http\Requests;

use App\Models\Gallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                Rule::unique('galleries', 'name')->ignore($this->gallery),
            ],
            'slug' => [
                'string',
                'required',
                Rule::unique('galleries', 'slug')->ignore($this->gallery),
            ],
            'image' => [
                'nullable'
            ],
            'video' => [
                'url',
                'nullable'
            ],
            'type' => [
                'required'
            ]
        ];
    }
}
