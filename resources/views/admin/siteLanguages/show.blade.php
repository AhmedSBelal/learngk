@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.siteLanguage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-languages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.siteLanguage.fields.id') }}
                        </th>
                        <td>
                            {{ $siteLanguage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteLanguage.fields.name') }}
                        </th>
                        <td>
                            {{ $siteLanguage->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.siteLanguage.fields.locale') }}
                        </th>
                        <td>
                            {{ $siteLanguage->locale }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.site-languages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection