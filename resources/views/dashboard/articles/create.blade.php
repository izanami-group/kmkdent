@extends('layouts.dashboard')

@section('title', __('dashboard.article-create'))

@section('content-dashboard')
    <h2>{{ __('article.create-new') }}</h2>

    <form novalidate action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title" class="{{ $errors->has('title') ? 'text-danger' : '' }}">
                {{ __('article.article-title') }}
            </label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="form-group">
            <label for="content" class="{{ $errors->has('content') ? 'text-danger' : '' }}">
                {{ __('article.article-content') }}
            </label>
            <textarea name="content" id="content" class="form-control" required data-replace-editor>{{ old('content') }}</textarea>
        </div>
        <div class="form-group">
            <label for="cover" class="{{ $errors->has('cover') ? 'text-danger' : '' }}">
                {{ __('article.article-image') }}
            </label>
            <input type="file" name="cover" id="cover" class="form-control-file">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">{{ __('article.create-button') }}</button>
        </div>
    </form>
@endsection

