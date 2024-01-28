<section id="wsus__location">
    <div class="wsus__location_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our location </h2>
                        <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                            estut clita dolorem ei est mazim fuisset scribentur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wsus__location_filter">
                        <button class="active" data-filter="*">All City</button>
                        @foreach($locations as $location)
                            <button data-filter=".{{$location->slug}}">{{ $location->name }}</button>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row grid">
                @foreach($locations as $location)
                    @foreach($location->approved_listings as $listing)
                        <div class="col-xl-3 col-sm-6 col-lg-4 {{$location->slug}}">
                            <x-frontend.listing-card :listing="$listing"/>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
</section>