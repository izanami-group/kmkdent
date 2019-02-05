@extends('layouts.dashboard')

@section('title', __('dashboard.title'))

@section('content-dashboard')
    <h2>{{ __('dashboard.title') }}</h2>

    <div class="row">
        <div class="col col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('articles.index') }}">{{ __('dashboard.articles-title') }}</a>
                </div>
                <div class="panel-body">{!! __('dashboard.articles-description') !!}</div>
            </div>
        </div>
    </div>
@endsection
