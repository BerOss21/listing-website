@extends('frontend.layouts.main')
@section('content')
<!--==========================
        BREADCRUMB PART START
    ===========================-->
<div id="breadcrumb_part">
    <div class="bread_overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <h4>sign up</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> sign up </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==========================
        BREADCRUMB PART END
    ===========================-->


<!--=========================
        SIGN IN START
    ==========================-->
<section class="wsus__login_page">
    <div class="container">
        <div class="row">
            <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                <div class="wsus__login_area">
                    <h2>Welcome back!</h2>
                    <p>sign up to continue</p>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label for="firstname">First Name</label>
                                    <input type="text" id="firstname" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autofocus autocomplete="firstname">
                                </div>
                                @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" id="lastname" placeholder="First Name" name="lastname" value="{{ old('lastname') }}" required autofocus autocomplete="lastname">
                                </div>
                                @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="username">
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" placeholder="Password" name="password" required autocomplete="new-password">
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <button type="submit" class="common_btn">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- <p class="or"><span>or</span></p>
                    <ul class="d-flex">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    </ul> -->
                    <p class="create_account">You have an account ? <a href="{{route('login')}}">login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================
        SIGN IN END
    ==========================-->

@endsection