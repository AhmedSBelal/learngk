@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.studyWork.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.study-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.id') }}
                        </th>
                        <td>
                            {{ $studyWork->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.name') }}
                        </th>
                        <td>
                            {{ $studyWork->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.slug') }}
                        </th>
                        <td>
                            {{ $studyWork->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.short_description') }}
                        </th>
                        <td>
                            {{ $studyWork->short_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.description') }}
                        </th>
                        <td>
                            {!! $studyWork->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.seo_description') }}
                        </th>
                        <td>
                            {{ $studyWork->seo_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.seo_keywords') }}
                        </th>
                        <td>
                            {{ $studyWork->seo_keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.image') }}
                        </th>
                        <td>
                            @if($studyWork->image)
                                <a href="{{ $studyWork->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $studyWork->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studyWork.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\StudyWork::TYPE_SELECT[$studyWork->type] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.study-works.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
