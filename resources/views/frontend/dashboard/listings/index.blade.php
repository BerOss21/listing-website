@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<div class="my_listing p_xm_0">
    <!-- <h4>listing type</h4> -->
    <div class="row">
        <div class="col-xxl-6 col-xl-12">
            <div class="active_inactive">
                <h6>active <span>3</span></h6>
                @forelse($listings as $listing)
                <div class="active_inactive_item">
                    <div class="active_inactive_img">
                        <img src="{{$listing->image}}" alt="{{$listing->title}}" class="img-fluid w-100">
                    </div>
                    <div class="active_inactive_text">
                        <h3>The Habit Burger Grill </h3>
                        <p><i class="far fa-map-marker-alt"></i> {{$listing->location->name}}</p>
                        <div class="color_text">
                            @if($listing->is_featured)
                                <a href="#"><i class="far fa-star"></i> Featured</a>
                            @endif
                            @if($listing->is_verified)
                                <a class="red" href="#"><i class="far fa-check"></i> Verified</a>
                            @endif
                        </div>
                        <ul>
                            <li><a href="dsahboard_listing_schedule.html"><i class="far fa-plus"></i></a></li>
                            <li><a href="#"><i class="fal fa-edit"></i></a></li>
                            <li><a href="#"><i class="fal fa-trash-alt"></i></a></li>
                        </ul>
                    </div>
                </div>
                @empty 
                    <div class="alert alert-info text-center">
                        No listing avaible
                    </div>
                @endforelse
            </div>
        </div>
       
    </div>
</div>
@endsection