
@extends('admin.layouts.auth')

@section('title','Admin password confirmation')

@section('header')
    <p>
        This is a secure area of the application. Please confirm your password before continuing.
    </p>
@endsection

@section('content')
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
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
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Confirm
            </button>
        </div>
    </form>
@endsection
