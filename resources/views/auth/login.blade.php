@extends('layouts.app')

@section('title','SignIn')


@section('content')

<!-- Add your site or application content here -->
<!-- Login Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body">
    <div class="container">
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a> -</li>
                <li class="active">SignIn Page</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="gradient-wrapper mb--sm">
                    <div class="gradient-title">
                        <h2>Signin to your account</h2>
                    </div>
                    <div class="input-layout1 gradient-padding">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input type="hidden" name="role_id" value="3">
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="email">Email <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" class="form-control"
                                            placeholder="Enter your phone number" value="{{old('email')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="password">Password <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group" style="margin-bottom: 15px;">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Type  Your Password">
                                    </div>
                                </div>
                                @if(Session::has('password'))
                                <span style="display: block; margin-left: 27%; margin-bottom: 2%;" class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ Session::get('ErrorMessage') }}</strong>
                                </span>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="sidebar-item-box">
                    <ul class="sidebar-more-option">
                        <li>
                            <a href="#"><img src="{{ asset('assets/img/banner/more2.png') }}" alt="more"
                                    class="img-fluid">Manage Product</a>
                        </li>
                        <li>
                            <a href="{{ route('favourite-ad')}}"><img src="{{ asset('assets/img/banner/more3.png') }}"
                                    alt="more" class="img-fluid">Favorite Ad list</a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-item-box">
                    <img src="{{ asset('assets/img/banner/sidebar-banner1.jpg') }}" alt="banner"
                        class="img-fluid m-auto">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Area End Here -->
@endsection