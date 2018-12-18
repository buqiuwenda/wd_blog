@extends('layouts.app')
@section('content')
    @component('layouts.header')
        <h4> {{ request()->get('q') }}</h4>
        <span class="subheading"> what you want to search</span>
    @endcomponent

    @include('widgets.article')
@endsection