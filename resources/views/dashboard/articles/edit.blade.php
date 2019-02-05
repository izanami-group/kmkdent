@extends('layouts.dashboard')

@section('title', __('dashboard.article-edit'))

@section('content-dashboard')
    <h2>{{ __('article.edit') }}</h2>

    <form novalidate action="{{ route('articles.update', ['article' => $article->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="title" class="{{ $errors->has('title') ? 'text-danger' : '' }}">
                {{ __('article.article-title') }}
            </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $article->title }}" required>
        </div>
        <div class="form-group">
            <label for="content" class="{{ $errors->has('content') ? 'text-danger' : '' }}">
                {{ __('article.article-content') }}
            </label>
            <textarea name="content" id="content" class="form-control" required data-replace-editor>
                {!! $article->content !!}
            </textarea>
        </div>
        <div class="form-row">
            <div class="col-sm-12 col-lg-6 py-3">
                <label for="cover" class="{{ $errors->has('cover') ? 'text-danger' : '' }}">
                    {{ __('article.article-content') }}
                </label>
                <input type="file" name="cover" id="cover" class="form-control-file">
                <span class="text-muted">{{ __('article.edit-current-picture') }}</span>
            </div>
            <div class="col-sm-12 col-lg-6 text-sm-center text-lg-left py-3">
                <img src="{{
                    $article->image !== NULL
                        ? Storage::disk('public')->url($article->image)
                        : Storage::disk('public')->url('noimage.jpg')
                }}">
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">{{ __('article.edit-button') }}</button>
        </div>
    </form>
@endsection

