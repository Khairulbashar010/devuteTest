@extends('layouts.admin.login')

@section('title', 'Register')

@section('content')
<h3 class="text-center" style="width:112%; margin-top:40vh; overflow:hidden;">
    @foreach ($errors->all() as $error)
        <div class="text-danger" style="margin-bottom:2%">{{ $error }}</div>
    @endforeach
    The link is expired.<br>Resend a code from below.<br>
    <form action="{{route('resend.verification.email')}}" method="post" style="margin-top:2%">
        @csrf
        @method('POST')
    <div class="form-group has-feedback">
        <input type="text" name="email">
        <button type="submit">Send</button>
    </div>

    </form>
</h3>
@endsection
