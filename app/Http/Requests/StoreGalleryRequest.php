<?php

namespace App\Http\Requests;

use App\Models\Gallery;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gallery_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                Rule::unique('galleries', 'name'),
            ],
            'slug' => [
                'string',
                'required',
                Rule::unique('galleries', 'slug'),
            ],
            'image' => [
                'required_without:video',
                'nullable',
            ],
            'video' => [
                'url',
                'required_without:image',
                'nullable',
            ],
            'type' => [
                'required'
            ]
        ];
    }
}
