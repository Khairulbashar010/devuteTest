@extends('layouts.admin.login')

@section('title','Change Password')
@section('content')
<h3 class="text-center" style="margin-top:40vh;">Set a new password.<br></h3>

<div class="login-box-body">
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger" style="margin-bottom:5%">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" action="{{ route('updatePassword') }}">
        @csrf
        @method('POST')
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
        <input type="hidden" name="user_id" value="{{$id}}">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
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