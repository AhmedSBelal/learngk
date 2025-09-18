<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class StoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_create');
    }

    public function rules()
    {
        $data = [
            'key' => [
                'string',
                'min:1',
                'max:100',
                'required',
                Rule::unique('settings', 'key'),
            ],
            'date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'number' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'multi_image' => [
                'array',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.text'] = [
                'string',
                'nullable',
            ];
            $data[$locale . '.short_description'] = [
                'string',
                'nullable',
            ];
            $data[$locale . '.long_description'] = [
                'string',
                'nullable',
            ];
        }

        return $data;
    }
}
