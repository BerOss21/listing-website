<div class="img">
    <img src="{{$listing->thumbnail_image}}" style="width:100% !important" alt="images">
</div>

<div class="map_popup_text">
    @if($listing->is_featured)
        <span><i class="far fa-star"></i> Featured</span>
    @endif
    @if($listing->is_verified)
        <span class="red"><i class="far fa-check"></i> verified</span>
    @endif
    
    <h5>{{ $listing->category->name  }}</h5>
    <a class="call" href="{{ $listing->phone }}"><i class="fal fa-phone-alt"></i>
        {{$listing->phone}}</a>
    <a class="mail" href="mailto:{{$listing->email}}"><i class="fal fa-envelope"></i>
        {{$listing->email}}</a>
    <p>{!! $listing->description !!}</p>
    <a class="read_btn" href="#">read more</a>
</div>