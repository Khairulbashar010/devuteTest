@extends('layouts.admin.login')

@section('title','Code Expired')
@section('content')
<h3 class="text-center">The link is expired.<br>Resend a code from below.<br></h3>

<div class="login-box-body">
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger" style="margin-bottom:5%">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" action="{{ route('resendVerificationEmail') }}">
        @csrf
        <div class="form-group has-feedback">
            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
    </form>
</div>

@endsection
