@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 50px;">
                <div class="well" style="background-color: #29c3ea;">
                    <form class="form" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <fieldset>
                            <legend class="text-center">注册</legend>

                            <div class="form-group">
                                <div class="col-md-10 offset-md-1">
                                    <label for="name" class="control-label">用户</label>
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="输入用户" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 offset-md-1">
                                    <label for="email" class="control-label">邮箱</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="输入邮箱" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 offset-md-1">
                                    <label for="password" class="control-label">密码</label>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="输入确认" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 offset-md-1">
                                    <label for="password-confirm" class="control-label">确认密码</label>

                                    <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="确认密码" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-10 offset-md-1">
                                    <button type="submit" class="btn btn-primary form-control">
                                       注册
                                    </button>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 offset-md-2 text-center">
                                    <a class="btn btn-link" href="{{ url('/login') }}">
                                       已有用户
                                    </a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
