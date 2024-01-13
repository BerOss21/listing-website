@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<div class="my_listing p_xm_0">
    <div class="row">
        <div class="col-xxl-6 col-xl-12">
            <div class="active_inactive">
                <h6>List<span>{{ $listings->total() }}</span></h6>
                @forelse($listings as $listing)
                <div class="active_inactive_item">
                    <div class="active_inactive_img">
                        <img src="{{$listing->image}}" alt="{{$listing->title}}" class="img-fluid w-100">
                    </div>
                    <div class="active_inactive_text">
                        <h3> {{ $listing->title }} </h3>
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
                            <li><a href="{{route('dashboard.listings.images.create',$listing->slug)}}"><i class="far fa-image"></i></a></li>
                            <li><a href="{{route('dashboard.listings.videos.create',$listing->slug)}}"><i class="far fa-video"></i></a></li>
                            <li><a href="{{route('dashboard.listings.schedules.index',$listing->slug)}}"><i class="far fa-calendar"></i></a></li>
                            <li><a href="{{ route('dashboard.listings.edit',$listing->slug) }}" class="bg-info"><i class="fal fa-edit"></i></a></li>
                            <li>
                                <a href="" class="bg-danger btn_delete_listing"><i class="fal fa-trash-alt"></i></a>
                                <form id="delete_listing_form" action="{{ route('dashboard.listings.destroy',$listing->slug) }}" class="d-none" method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @empty 
                    <div class="alert alert-info text-center">
                        No listing avaible
                    </div>
                @endforelse

                <div class="mt-3">
                    {{ $listings->withQueryString()->links() }}
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $('.btn_delete_listing').on('click',async function(e){
            e.preventDefault();

            const willDelete=await swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this listing!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })

            if(willDelete)
            {
                $('#delete_listing_form').submit();
            }
        })
    </script>
@endpush