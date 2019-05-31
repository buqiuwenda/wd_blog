@extends('layouts.app')
@section('style')
    <style>
       .social-share{
           margin-bottom:20px;
       }
       .article{
           margin-top:20px;
       }

        .social-share{
            font-family:socialshare!important;
            font-size:16px;
            font-style:normal;
            -webkit-font-smoothing:antialiased;
            -webkit-text-stroke-width:.2px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <!-- CODE START -->
                 @include('widgets.show')


                <!-- CODE END -->
            </div>
            @include('widgets.slider')
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/jquery.qrcode.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $(".")
        })
    </script>
@endsection


