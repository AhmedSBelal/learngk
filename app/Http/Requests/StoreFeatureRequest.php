<?php

namespace App\Http\Requests;

use App\Models\Feature;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFeatureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('feature_create');
    }

    public function rules()
    {
        $data = [
            'image' => [
                'required'
            ]
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.title'] = [
                'string',
                'required',
            ];
            $data[$locale . '.description'] = [
                'required',
            ];
        }

        return $data;
    }
}
