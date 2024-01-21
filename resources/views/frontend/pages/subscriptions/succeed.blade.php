@extends('frontend.layouts.main')
@section('content')
<section id="wsus__custom_page">
    <div class="container">
        <div class="alert alert-success text-center mx-auto w-70">
            <h3 class="mb-2">Subscription succeed</h3> 
            <a href="{{route('dashboard')}}">Dashboard</a>
        </div>    
    </div>
</section>
@endsection