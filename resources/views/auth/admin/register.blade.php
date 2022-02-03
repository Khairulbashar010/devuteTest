@extends('layouts.admin.login')

@section('title', 'Register')

@section('content')
<div class="login-box-body">
    <p class="login-box-msg">Register to Join</p>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger mb-5">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group has-feedback">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                name="password" required placeholder="Password">
            <span style="pointer-events: all;" id="eye" onclick="toggle()"
                class="glyphicon show glyphicon-eye-open form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation" required placeholder="Re-type password">
            <span style="pointer-events: all;" id="eye"
                class=""></span>
        </div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <a href="{{route('signin')}}"> Already Registered?</a>
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
