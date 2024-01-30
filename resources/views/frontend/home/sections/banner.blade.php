<section id="wsus__banner" style="background: url({{$hero->background}})">
    <div class="wsus__banner_overlay">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-7">
                    <div class="wsus__banner_text">
                        <h1>{{$hero->title}}</h1>
                        <p>{{ $hero->sub_title}}</p>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5">
                    <x-frontend.filter-banner/>
                </div>
            </div>
        </div>
    </div>
</section>
