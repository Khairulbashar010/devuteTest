@extends('layouts.admin.login')

@section('title', 'Login')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
            @if(Session::has('password-change'))
                <span style="display: block;" class="invalid-feedback" role="alert">
                    <strong class="text-success">{{ Session::get('ErrorMessage') }}</strong>
                </span>
            @endif
        <div class="form-group has-feedback">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if(Session::has('email'))
            <span style="display: block;" class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ Session::get('ErrorMessage') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group has-feedback">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required autocomplete="current-password" placeholder="Password">
            <span style="pointer-events: all;" id="eye" onclick="toggle()"
                class="glyphicon show glyphicon-eye-open form-control-feedback"></span>
            @if(Session::has('password'))
            <span style="display: block;" class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ Session::get('ErrorMessage') }}</strong>
            </span>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-8">
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-xs-7">
                <div class="checkbox icheck">
                    <label>
                        <a href="{{ route('signup') }}">Join Us</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-5">
                <div class="checkbox icheck">
                    <label>
                        <a href="{{ route('forgotPassword') }}">Forgot Password?</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
        </div>
    </form>
</div>
<script type="text/javascript">
    var state = false;
    function toggle() {
        if (state) {
            document.getElementById("password").setAttribute("type", "password");
            document.getElementById("eye").style.color = '#7a797e';
            state = false;
        } else {
            document.getElementById("password").setAttribute("type", "text");
            document.getElementById("eye").style.color = '#5887ef';
            state = true;
        }
    }
</script>
@endsection
