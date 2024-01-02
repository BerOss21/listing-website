@extends('admin.layouts.auth')

@section('title','Admin reset password')

@section('header')
    <h4>Admin reset password</h4>
@endsection

@section('content')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
        
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
            </div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2">
            @error('password')
            <div class="invalid-feedback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password_confirmation" class="control-label">Password confirmation</label>
            </div>
            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" tabindex="2">
            @error('password_confirmation')
            <div class="invalid-feedback text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Reset password
            </button>
        </div>
    </form>
@endsection






