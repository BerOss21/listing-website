
@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
    <form method="POST" action="{{ route('dashboard.listings.store') }}" enctype="multipart/form-data">
        @csrf
        @include('frontend.dashboard.listings.partials.create.main')
        @include('frontend.dashboard.listings.partials.create.images_videos')
        @include('frontend.dashboard.listings.partials.create.description')
        @include('frontend.dashboard.listings.partials.create.amenities')
        @include('frontend.dashboard.listings.partials.create.social_links')
        @include('frontend.dashboard.listings.partials.create.seo')
        <div class="col-xl-12">
            <button type="submit" class="read_btn">save</button>
        </div>
    </form>
@endsection