<div class="wsus__featured_single">
    <div class="wsus__featured_single_img">
        <img src="{{$listing->thumbnail_image}}" alt="images" class="img-fluid w-100">
        <a href="#" class="love"><i class="fas fa-heart"></i></a>
        <a href="#" class="small_text">{{ $listing->category->name }}</a>
    </div>
    <a class="map modal_detail_listing_btn"  data-listing="{{$listing->slug}}" href="#"><i class="fas fa-info"></i></a>

    <!-- <a class="map" data-bs-toggle="modal" id="modal_detail_listing_btn" data-bs-target="#modal_detail_listing" data-listing="{{$listing->slug}}" href="#"><i class="fas fa-info"></i></a> -->
    <div class="wsus__featured_single_text">
        <p class="list_rating">
            @for($i=1;$i<=5;$i++) 
                @if($i<=$listing->active_reviews_avg_rating)
                <i class="fas fa-star"></i>
                @else
                <i class="far fa-star"></i>
                @endif
            @endfor
            <span>({{$listing->active_reviews_count}} {{Str::plural('review',$listing->active_reviews_count)}})</span>
        </p>
        <a href="#">{{ $listing->title }}</a>
        <p class="address"> {{ $listing->location->name }}</p>
    </div>
</div>