@extends('admin.layouts.auth')

@section('title','Login')

@section('header')
    <h4>Login</h4>
@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" tabindex="1" autofocus>
            @error('email')
            <div class="invalid-feedback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">Password</label>
                @if (Route::has('admin.password.request'))
                <div class="float-right">
                    <a href="{{ route('admin.password.request') }}" class="text-small">
                        Forgot Password?
                    </a>
                </div>
                @endif
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2">
            @error('password')
            <div class="invalid-feedback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
            </button>
        </div>
    </form>
@endsection
