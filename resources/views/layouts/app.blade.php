<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'WenDa') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
        <footer id="footer" class="footer">
            <div class="container text-center">
                <div class="row content">
                    <div class="col-md-4 col-md-offset-4">
                        <ul class="connect">
                            <li>
                                <a href="{{ url('/') }}">
                                    <i class="large ion-ios-home"></i>
                                </a>
                            </li>
                            @if (config('blog.footer.github.open'))
                                <li>
                                    <a href="{{ config('blog.footer.github.url') }}" target="_blank">
                                        <i class="large ion-social-github icon"></i>
                                    </a>
                                </li>
                            @endif

                        </ul>
                        <div class="links">
                            <a href="{{ url('link') }}">友情链接</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right text-center">
                <span><a>{!! config('blog.footer.mate') !!}</a></span>
                <span><a>{!! config('blog.footer.icpno') !!}</a></span>
            </div>
        </footer>
    </div>
    {{--<script src="{{ asset('js/home.js') }}"></script>--}}
    @yield('scripts')
</body>
</html>
