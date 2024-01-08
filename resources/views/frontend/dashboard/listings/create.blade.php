
@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
    @include('frontend.dashboard.listings.partials.create.main')
    @include('frontend.dashboard.listings.partials.create.images_videos')
    @include('frontend.dashboard.listings.partials.create.description')
    @include('frontend.dashboard.listings.partials.create.amenities')
    @include('frontend.dashboard.listings.partials.create.social_links')
    @include('frontend.dashboard.listings.partials.create.seo')
@endsection