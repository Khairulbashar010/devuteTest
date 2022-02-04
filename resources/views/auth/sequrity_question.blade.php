@extends('layouts.admin.login')

@section('title','Forgot Password')
@section('content')
<h3 class="text-center" style="margin-top:40vh;">Select a sequrity question to answer<br></h3>

<div class="login-box-body">
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <div class="text-danger" style="margin-bottom:5%">{{ $error }}</div>
        @endforeach
    @endif
    <form method="POST" action="{{ route('checkAnswer') }}">
        @csrf
        @method('POST')
        <div class="form-group has-feedback">
            <select name="question" id="question" class="form-control">
                <option disabled selected>-- Select a question --</option>
                <option value="mother_maiden_name">What is your mother's maiden name?</option>
                <option value="first_pet">What was your first pet?</option>
                <option value="favourite_teacher">Who is your favourite teacher?</option>
            </select>
        </div>
        <div class="form-group has-feedback">
            <input type="text" id="answer" class="form-control @error('answer') is-invalid @enderror" name="answer"
                value="{{ old('answer') }}" required>
        </div>
        <input type="hidden" name="user_id" value="{{$id}}">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
    </form>
</div>

@endsection