@extends('frontend.layouts.main')
@section('content')
<div id="breadcrumb_part" style="background: url({{$listing->category->background}});">
    <div class="bread_overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <h4>{{$listing->title}}</h4>
                    <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page"> listing details </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==========================
        BREADCRUMB PART END
    ===========================-->


<!--==========================
        LISTING DETAILS START
    ===========================-->
<section id="listing_details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="listing_details_text">
                    <div class="listing_det_header">
                        <div class="listing_det_header_img">
                            <img src="{{ $listing->image }}" alt="logo" class="img-fluid w-100">
                        </div>
                        <div class="listing_det_header_text">
                            <h6>{{ \Str::title($listing->title) }}</h6>
                            <p class="host_name">Hosted by <a href="">{{$listing->user->email}}</a></p>
                            <p class="rating">
                                @for($i=1;$i<=5;$i++) 
                                    @if($i<=$listing->active_reviews_avg_rating)
                                    <i class="fas fa-star"></i>
                                    @else
                                    <i class="far fa-star"></i>
                                    @endif
                                @endfor
                                <span>({{$listing->active_reviews_count}} {{Str::plural('review',$listing->active_reviews_count)}})</span>
                            </p>
                            <ul>
                                @if($listing->is_verified)
                                <li><a href="#"><i class="far fa-check"></i> Verified</a></li>
                                @endif

                                <!-- <li><a href="#"><i class="fal fa-heart"></i> Add to Favorite</a></li> -->
                                <li><a href="#"><i class="fal fa-eye"></i> {{ $listing->views }}</a></li>
                                @if($listing->schedules->count())
                                @if($open)
                                <li><a href="#" class="bg-success">Open</a></li>
                                @else
                                <li><a href="#" class="bg-danger">Close</a></li>
                                @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="listing_det_text">
                        {!! $listing->description !!}
                    </div>
                    <div class="listing_det_Photo">
                        <div class="row">
                            @foreach($listing->images as $image)
                            <div class="col-xl-3 col-sm-6">
                                <a class="venobox" data-gall="gallery01" href="{{$image->image}}">
                                    <img src="{{$image->image}}" alt="gallery1" class="img-fluid w-100">
                                    <div class="photo_overlay">
                                        <i class="fal fa-plus"></i>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="listing_det_feature">
                        <div class="row">
                            @foreach($listing->amenities as $amenity)
                            <div class="col-xl-4 col-sm-6">
                                <div class="listing_det_feature_single">
                                    <i class="{{ $amenity->icon }}"></i>
                                    <span>{{ $amenity->name }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="listing_det_video">
                        <div class="row">
                            @foreach($listing->videos as $video)
                            <div class="col-xl-4 col-sm-6">
                                <div class="listing_det_video_img">
                                    <img src="{{ $video->image }}" alt="img" class="img-fluid w-100">
                                    <a class="venobox" data-autoplay="true" data-vbtype="video" href="{{ $video->url }}">
                                        <i class=" fas fa-play"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="listing_det_location">
                        {!! $listing->google_map_embed_code !!}
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14602.678639283793!2d90.39695083611213!3d23.794774936848686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70c15ea1de1%3A0x97856381e88fb311!2z4Kas4Kao4Ka-4Kao4KeAIOCmruCmoeCnh-CmsiDgpp_gpr7gpongpqgsIOCmouCmvuCmleCmvg!5e0!3m2!1sbn!2sbd!4v1634550875957!5m2!1sbn!2sbd" width="1000" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
                    </div>
                    <div class="wsus__listing_review">
                        <h4>reviews ({{$listing->active_reviews->count()}})</h4>

                        <div class="reviews">
                            @forelse($listing->active_reviews as $review)
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="{{$review->user->avatar}}" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>
                                        {{$review->user->firstname}} {{$review->user->lastname}}
                                        <span>
                                            @for($i=1;$i<=5;$i++) 
                                                @if($i<=$review->rating)
                                                <i class="fas fa-star"></i>
                                                @else
                                                <i class="far fa-star"></i>
                                                @endif
                                             @endfor
                                        </span>
                                        @if(!$review->approved)
                                            <span class="p-1 text-center bg-warning rounded text-white font-bold">waiting for approval</span>
                                        @endif
                                    </h5>
                                    <span>{{$review->created_at->format('d-M-Y')}}</span>
                                   
                                    <p>{{$review->content}}</p>
                                </div>
                            </div>
                            @empty
                            <div class="alert alert-warning text-center">No reviews avaible</div>
                            @endforelse
                        </div>
                        @auth
                        <form class="input_comment" id="form_review" action="{{route('listings.reviews',$listing->slug)}}">
                            @csrf
                            <h5>add a review</h5>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__select_rating">
                                        <i class="fas fa-star"></i>
                                        <select class="select_2" id="rating_select" name="rating">
                                            <option value="">select rating</option>
                                            <option> 1 </option>
                                            <option> 2 </option>
                                            <option> 3 </option>
                                            <option> 4 </option>
                                            <option> 5 </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="blog_single_input">
                                        <textarea name="content" cols="3" rows="5" placeholder="Comment"></textarea>
                                        <button type="submit" class="read_btn">submit review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else
                            <div class="alert alert-info">
                                You should <a href="{{route('login')}}">login</a> to add your comment
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="listing_details_sidebar">
                    <div class="row">
                        <div class="col-12">
                            <div class="listing_det_side_address">
                                <a href="callto:{{$listing->phone}}"><i class="fal fa-phone-alt"></i>{{ $listing->phone ?? '--'}}</a>
                                <a href="mailto:{{$listing->email}}"><i class="fal fa-envelope"></i>{{ $listing->email ?? '--'}}</a>
                                <p><i class="fal fa-map-marker-alt"></i>{{ $listing->location->name ?? '--' }}</p>
                                <p><i class="fal fa-globe"></i>{{$listing->website ?? '--'}}</p>
                                <ul>
                                    <li><a href="{{$listing->facebook_link}}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="{{$listing->x_link}}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="{{$listing->linkedin_link}}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{$listing->whatsapp_link}}"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="listing_det_side_open_hour">
                                <h5>Opening Hours</h5>
                                @forelse($listing->schedules as $schedule)
                                <p>{{ Str::title($schedule->day->value )}}<span>{{ $schedule->start_time }} - {{ $schedule->end_time }}</span></p>
                                @empty
                                <p>Not avaible</p>
                                @endforelse
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="listing_det_side_contact">
                                <h5>Claim</h5>
                                @auth
                                    <form action="{{ route('listings.claims',$listing->slug) }}" method="post">
                                        @csrf
                                        <textarea cols="5" rows="5" name="claim" placeholder="Claim*"></textarea>
                                        <button type="submit" class="read_btn">send</button>
                                    </form>
                                @else
                                    <div class="alert alert-info">
                                        You should <a href="{{route('login')}}">login</a> to send your claim
                                    </div>
                                @endauth

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="listing_det_side_contact">
                                <h5>Message</h5>
                                @auth
                                    <form action="{{ route('chat.store',$listing->user_id) }}" method="post">
                                        @csrf
                                        <textarea cols="5" rows="5" name="content" placeholder="Message*"></textarea>
                                        <button type="submit" class="read_btn">send</button>
                                    </form>
                                @else
                                    <div class="alert alert-info">
                                        You should <a href="{{route('login')}}">login</a> to send your message
                                    </div>
                                @endauth

                            </div>
                        </div>

                        <div class="col-12">
                            <div class="listing_det_side_list">
                                <h5>Similar Listing</h5>
                                @foreach($similar_listings as $item)
                                <a href="{{route('pages.listing-detail',$item->slug)}}" class="sidebar_blog_single">
                                    <div class="sidebar_blog_img">
                                        <img src="{{ $item->thumbnail_image }}" alt="blog" class="imgofluid w-100">
                                    </div>
                                    <div class="sidebar_blog_text">
                                        <h5>{{ $item->title }}</h5>
                                        <p> <span>{{ $item->created_at->format('d/m/Y') }} </span> {{$item->active_reviews_count}} {{ Str::plural('Comment',$item->active_reviews_count) }} </p>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==========================
        LISTING DETAILS END
    ===========================-->
@endsection

@push('js')
<script>
    $('#form_review').on('submit', async function(e) {
        e.preventDefault();
        try {
            const response = await $.ajax({
                method: 'post',
                url: $(this).attr('action'),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                data: $(this).serializeArray()
            });

            $('.reviews').append(response);

            $(this).trigger("reset");
            $("#rating_select").val('').trigger('change')

            var lastChild = $(".reviews").children().last();

            $(".reviews").animate({
                scrollTop: lastChild.offset().top
            }, 800);
        } 
        catch (error) 
        {
            if (error.status === 422) 
            {
                var errors = error.responseJSON.errors;
                $.each(errors, function (key, value) {
                    iziToast.error({
                        title: '',
                        message: value,
                        position: 'topRight'
                    });
                });
            } 
            console.log("error", error);
        }
    })
</script>
@endpush