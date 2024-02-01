@extends('frontend.layouts.main')

@push('head')
    @stack('dashboard_head')
@endpush

@push('js')
    @stack('dashboard_js')
@endpush

@section('content')
<section id="dashboard">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="dashboard_sidebar">
            <span class="close_icon"><i class="far fa-times"></i></span>
            <a href="{{route('dashboard')}}" class="dash_logo"><img src="{{auth()->user()->avatar}}" alt="logo"
                class="img-fluid"></a>
            <ul class="dashboard_link">
              <li><a class="active" href="{{route('dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
              <li><a href="{{route('dashboard.listings.index')}}"><i class="fas fa-list-ul"></i> My Listing</a></li>
              <li><a href="{{route('dashboard.listings.create')}}"><i class="fal fa-plus-circle"></i> Create Listing</a></li>
              <li><a href="dsahboard_review.html"><i class="far fa-star"></i> Reviews</a></li>
              <li><a href="dsahboard_wishlist.html"><i class="far fa-heart"></i> Wishlist</a></li>
              <li><a href="{{route('dashboard.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
              <li><a href="{{route('dashboard.orders.index')}}"><i class="fal fa-notes-medical"></i> Orders</a></li>
              <li><a href="dsahboard_package.html"><i class="fal fa-gift-card"></i> Package</a></li>
              <li><a href="{{route('dashboard.messages.index')}}"><i class="far fa-comments-alt"></i> Message</a></li>
              <li><a href="#"><i class="far fa-sign-out-alt"></i> Logo</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="dashboard_content">
            @yield('dashboard_content')
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection