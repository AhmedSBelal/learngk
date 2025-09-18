@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.article.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.id') }}
                        </th>
                        <td>
                            {{ $article->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.title') }}
                        </th>
                        <td>
                            {{ $article->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.slug') }}
                        </th>
                        <td>
                            {{ $article->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.image') }}
                        </th>
                        <td>
                            @if($article->image)
                                <a href="{{ $article->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $article->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.description') }}
                        </th>
                        <td>
                            {{ $article->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.article') }}
                        </th>
                        <td>
                            {!! $article->article !!}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.seo_description') }}
                        </th>
                        <td>
                            {{ $article->seo_description }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.seo_keywords') }}
                        </th>
                        <td>
                            {{ $article->seo_keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.article.fields.publish') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $article->publish ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.articles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
