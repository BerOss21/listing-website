@extends('admin.layouts.auth')

@section('title','Admin email password')

@section('header')
    <p>
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
    </p>
@endsection

@section('content')
    <form method="POST" action="{{ route('password.email') }}">
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
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Email Password Reset Link
            </button>
        </div>
    </form>
@endsection


