<?php

namespace App\Http\Requests;

use App\Models\Faq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class UpdateFaqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faq_edit');
    }

    public function rules()
    {
        $data = [];

        foreach (siteLanguages() as $locale) {
            $data[$locale . '.question'] = [
                'string',
                'required',
                Rule::unique('faq_translations', 'question')->ignore($this->faq->translate($locale) ? $this->faq->translate($locale)->id : $this->faq->id),
            ];
            $data[$locale . '.answer'] = [
                'required',
            ];
        }

        return $data;
    }
}
