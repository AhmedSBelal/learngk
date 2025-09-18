<?php

namespace App\Http\Requests;

use App\Models\SiteLanguage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySiteLanguageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('site_language_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:site_languages,id',
        ];
    }
}
