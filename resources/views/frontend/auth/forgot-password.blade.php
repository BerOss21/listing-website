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
                    <h4>sign in</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> sign in </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<x-auth-session-status class="mb-4" :status="session('status')" />
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
                    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p> 
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="wsus__login_imput">
                                    <label>email</label>
                                    <input type="text" name="email" value="{{old('email')}}" placeholder="Email">
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-12">
                                <div class="">
                                    <button type="submit">  {{ __('Email Password Reset Link') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========================
        SIGN IN END
    ==========================-->
@endsection