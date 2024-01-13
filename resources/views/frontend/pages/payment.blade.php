@extends('frontend.layouts.main')
@section('content')
<!--==========================
        BREADCRUMB PART START
    ===========================-->
<div id="breadcrumb_part">
    <div class="bread_overlay">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center text-white">
                    <h4>payment pages</h4>
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                            <li class="breadcrumb-item active" aria-current="page">payment pages</li>
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
        PAYMENT PAGE START
    ===========================-->
<section id="wsus__custom_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="wsus__payment_area">
                    <div class="row">
                        <div class="col-lg-3 col-6 col-sm-4">
                            <a class="wsus__single_payment" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                <img src="{{asset('frontend/assets/images/pay_1.jpg')}}" alt="payment method" class="img-fluid w-100">
                            </a>
                        </div>
                        <div class="col-lg-3 col-6 col-sm-4">
                            <a class="wsus__single_payment" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                                <img src="{{asset('frontend/assets/images/pay_2.jpg')}}" alt="payment method" class="img-fluid w-100">
                            </a>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-7">
                <div class="member_price">
                    <h4>{{ $package->name }}</h4>
                    <h5>{{ $package->price }} <span>/ {{$package->days}}</span></h5>
                    <p>{{$package->listings}}</p>
                    <p>{{$package->photos}}</p>
                    <p>{{$package->videos}}</p>
                    <p>{{$package->amenities}}</p>
                    <p>{{$package->featured_listings}}</p>
                    <a href="{{ route('pages.payment',$package->slug) }}">Order now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="wsus__payment_modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="wsus__pay_modal_info">
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Libero, tempora cum optio
                            cumque rerum dolor impedit exercitationem? Eveniet suscipit repellat, quae natus hic
                            assumenda.</p>
                        <ul>
                            <li>Natus hic assumenda consequatur excepturi ducimu.</li>
                            <li>Cumque rerum dolor impedit exercitationem Eveniet.</li>
                            <li>Dolor sit amet consectetur adipisicing elit tempora cum </li>
                        </ul>
                        <form>
                            <input type="text" placeholder="Enteer Something">
                            <input type="text" placeholder="Enteer Something">
                            <textarea rows="4" placeholder="Enter Something"></textarea>
                            <div class="wsus__payment_btn_area">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==========================
        CUSTOM PAGE END
    ===========================-->
@endsection