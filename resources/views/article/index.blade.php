@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
       @include('widgets.article')
       @include('widgets.slider')
    </div>
    </div>
@endsection

