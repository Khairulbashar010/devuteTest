@extends('layouts.user.register')

@section('title','SignUp')


@section('content')

<!-- Add your site or application content here -->
<!-- Login Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body">
    <div class="container">
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a> -</li>
                <li class="active">SignUp Page</li>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="gradient-wrapper mb--sm">
                    <div class="gradient-title">
                        <h2>Creat An Account</h2>
                    </div>
                    <div class="input-layout1 gradient-padding">
                        <form id="login-page-form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="role_id" value="3">
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label possition-top" for="first-name">Account
                                        <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <div class="radio radio-primary radio-inline">
                                            <input type="radio" id="accountType1" value="1" name="accountType" checked>
                                            <label for="accountType1">Indivisual</label>
                                        </div>
                                        <div class="radio radio-primary radio-inline">
                                            <input type="radio" id="accountType2" value="2" name="accountType">
                                            <label for="accountType2"> Business </label>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('accountType'))
                                <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name"></label>
                                    </div>
                                    <span style="display: block; margin: -2% 0 2% 2%;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountType') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="first-name">Full Name <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <input type="text" id="first-name" class="form-control"
                                            placeholder="Your Full Name" name="name" required value="{{ old('name') }}">
                                    </div>
                                </div>
                                @if ($errors->has('name'))
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name"></label>
                                    </div>
                                    <span style="display: block; margin: -2% 0 2% 2%;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="phone">Phone <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <input type="text" id="phone" class="form-control" name="phoneNumber"
                                            placeholder="Your Phone Number" required value="{{ old('phoneNumber') }}">
                                    </div>
                                </div>
                                @if ($errors->has('phoneNumber'))
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name"></label>
                                    </div>
                                    <span style="display: block; margin: -2% 0 2% 2%;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phoneNumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="first-name">Email</label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <input type="text" id="first-name2" class="form-control" name="email"
                                            placeholder="Enter your e-mail here" value="{{ old('email') }}">
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name"></label>
                                    </div>
                                    <span style="display: block; margin: -2% 0 2% 2%;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="password">Password <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Type Your Password" name="password">
                                    </div>
                                </div>
                                @if ($errors->has('password') && !$errors->has('password_confirmation'))
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name"></label>
                                    </div>
                                    <span style="display: block; margin: -2% 0 2% 2%;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3 col-12">
                                    <label class="control-label" for="password">Confirm Password <span>*</span></label>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="form-group">
                                        <input type="password" id="password" class="form-control"
                                            placeholder="Re-type Your Password" name="password_confirmation">
                                    </div>
                                </div>
                                @if ($errors->has('password_confirmation') )
                                    <div class="col-sm-3 col-12">
                                        <label class="control-label" for="first-name"></label>
                                    </div>
                                    <span style="display: block; margin: -2% 0 2% 2%;" class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="timezone" id="timezone">
                            <div class="row">
                                <div class="ml-auto col-sm-9 col-12 ml-none--mb">
                                    <div class="form-group">
                                        <button type="submit" class="cp-default-btn-sm">SignUp Now!</button>
                                    </div>
                                </div>
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