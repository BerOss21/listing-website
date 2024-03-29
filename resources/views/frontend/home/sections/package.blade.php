<section id="wsus__package">
    <div class="wsus__package_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our pricing </h2>
                        <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                            estut clita dolorem ei est mazim fuisset scribentur.</p>
                    </div>
                </div>
            </div>
            <div class="procing_area">
                <div class="row">
                    @foreach($packages as $package)
                        <div class="col-xl-4 col-md-6 col-lg-4">
                            <div class="member_price">
                                <h4>{{ $package->name }}</h4>
                                <h5>{{ Currency::format($package->price) }} <span>/ {{$package->days}}</span></h5>
                                <p>{{$package->listings}}</p>
                                <p>{{$package->photos}}</p>
                                <p>{{$package->videos}}</p>
                                <p>{{$package->amenities}}</p>
                                <p>{{$package->featured_listings}}</p>
                                <a href="{{ route('pages.payment',$package->slug) }}">Order now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>