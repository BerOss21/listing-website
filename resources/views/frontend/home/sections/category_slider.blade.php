<section id="wsus__category_slider">
    <div class="container">
        <div class="wsus__category_slider_area">
            <div class="row category_slider">
                @foreach($categories as $categeory)
                <div class="col-xl-2">
                    <a href="{{route('pages.listings',$categeory->id) }}" class="wsus__category_single_slider">
                        <span>
                            <img src="{{$categeory->icon}}" alt="category" class="img-fluid w-100">
                        </span>
                        <p>{{$categeory->name}}</p>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>