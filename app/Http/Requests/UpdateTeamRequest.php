<?php

namespace App\Http\Requests;

use App\Models\Team;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateTeamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_edit');
    }

    public function rules()
    {
        $data = [
            'slug' => [
                'required',
                Rule::unique('teams', 'slug')->ignore($this->team),
            ],
            'image' => [
                'required',
            ],
            'email' => [
                'required',
                'email:rfc,dns',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'facebook' => [
                'url',
                'nullable',
            ],
            'instagram' => [
                'url',
                'nullable',
            ],
            'twitter' => [
                'url',
                'nullable',
            ],
            'linkedin' => [
                'url',
                'nullable',
            ],
        ];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.name'] = [
                'string',
                'required',
            ];
            $data[$locale . '.description'] = [
                'required',
                'string'
            ];
        }

        return $data;
    }
}
