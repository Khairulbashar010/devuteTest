@extends('layouts.admin.app')

@section('title', 'Profile')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Update Profile
        </h1>
    </section>
    <h4 class="text-danger text-center">* The questions are important in case you forget your password *</h4>

    <!-- Main content -->
    <section class="content">
        <!-- START ACCORDION & CAROUSEL-->
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="box-group" id="accordion">
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"><strong>Profile</strong></h3>
                            </div>
                            <form validate="true" role="form" method="post"
                                action="{{route('common.updateProfile')}}">
                                @csrf
                                @method('POST')
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ Auth::user()->name }}" required placeholder="Your Full Name *">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ Auth::user()->email }}" disabled
                                            placeholder="Your Email *">
                                    </div>
                                    <div class="form-group">
                                        <label for="mother_maiden_name">What is your mother's maiden name?</label>
                                        <input type="text" id="mother_maiden_name" class="form-control" name="mother_maiden_name" required placeholder="Enter your mother's maiden name" value="{{@$answers->mother_maiden_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="first_pet">What was your first pet?</label>
                                        <input type="text" id="first_pet" class="form-control" name="first_pet" required placeholder="Enter your first pet's name" value="{{@$answers->first_pet}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="favourite_teacher">Who is your favourite teacher?</label>
                                        <input type="text" id="favourite_teacher" class="form-control" name="favourite_teacher" required placeholder="Enter your favourite teacher's name" value="{{@$answers->favourite_teacher}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Current Password</label>
                                        <input type="password" id="password" class="form-control" name="password"
                                            required placeholder="Enter your current password">
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        @if(Auth::user()->role_id == 1)
                                            <a href="{{route('admin.dashboard')}}" class="btn btn-danger" style="float: right">Cancel</a>
                                        @else
                                            <a href="{{route('user.dashboard')}}" class="btn btn-danger"
                                            style="float: right">Cancel</a>
                                        @endif

                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ACCORDION & CAROUSEL-->
    </section>
</div>
<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password").value = "";
    }
</script>
@endsection
