@extends('layouts.app')

@section('content')
    <div class="container vc-container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <!-- CODE START -->
                 @include('widgets.show')


                <!-- CODE END -->
            </div>
            @include('widgets.slider')
        </div>
    </div>
@endsection


@section('scripts')

@endsection


