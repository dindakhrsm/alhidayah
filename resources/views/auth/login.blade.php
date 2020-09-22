@extends('layouts.app')
@section('content')
    <div class="login-box" >
        <div class="login-logo">
           <center> <img src="{{ asset('img/logo_alhidayah.png') }}" class="img-responsive" width="100">
           </center>
            <a href={{"home"}}><b>Masjid</b>&nbsp;Al-Hidayah</a>
        </div>

        <!-- /.login-logo -->
        <div class="login-box-body" style="box-shadow: 3px 3px 3px 3px;padding: 20px;">
            <p class="login-box-msg">Sign in</p>
            <form method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                {{-- <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input type="text" class="form-control" placeholder="Email / Username" name="email" value="{{ old('email') }}">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div> --}}
                <div class="form-group  {{ $errors->has('username') || $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input id="login" type="text"
                        class="form-control"
                        name="login"
                        value="{{ old('username') ?: old('email') }}"
                        placeholder="Username / Email" required autofocus>

                    @if ($errors->has('username') || $errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') ?: $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}  has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <span class="fa fa-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <br>
            <a href="{{ url('/password/reset') }}">I forgot my password</a><br>
        </div>
        <!-- /.login-box-body -->
    </div>
    <br>
    <br>
    <!-- /.login-box -->

@endsection
