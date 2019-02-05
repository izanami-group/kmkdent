@extends('layouts.dashboard')

@section('title', __('dashboard.articles'))

@section('content-dashboard')
    <h2>{{ __('dashboard.articles-title') }}</h2>
    <a class="btn btn-primary" href="{{ route('articles.create') }}">
        {{ __('article.create-new') }}
    </a>

    <hr>

    <div class="row">
        @foreach($articles as $a)
            <div class="col-sm-12 py">
                <div class="media">
                    <div class="media-left">
                        <img
                            class="media-object"
                            src="{{
                                $a->image !== NULL
                                    ? Storage::disk('public')->url($a->image)
                                    : Storage::disk('public')->url('noimage.jpg')
                            }}"
                            alt="{{ $a->title }}"
                        >
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            <a href="{{ route('articles.edit', ['article' => $a->id]) }}">{{ $a->title }}</a>
                        </h4>

                        <hr>

                        <div class="btn-group" role="group" aria-label="actions">
                            <a
                                href="{{ route('articles.edit', ['article' => $a->id]) }}"
                                class="btn btn-primary"
                            >
                                {{ __('article.edit') }}
                            </a>
                            <a
                                href="{{ route('articles.destroy', ['article' => $a->id]) }}"
                                class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('destroy-form').submit();"
                            >
                                {{ __('article.delete') }}
                            </a>
                        </div>

                        <form
                            id="destroy-form"
                            style="display: none;"
                            action="{{ route('articles.destroy', ['article' => $a->id]) }}"
                            method="POST"
                        >
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

