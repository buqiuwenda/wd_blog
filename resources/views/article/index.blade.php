@extends('layouts.app')

@section('content')

    @component('layouts.header')
        <h1>{{ config('blog.article.title') }}</h1>
        <span class="subheading">{{ config('blog.article.description') }}</span>
    @endcomponent
    @include('widgets.article')
    {{ $articles->links('pagination.default') }}
@endsection

@section('scripts')


@endsection