@extends('frontend.layouts.main')
@section('content')
    <!--==========================
        BANNER PART START
    ===========================-->
    @include('frontend.home.sections.banner')
    <!--==========================
        BANNER PART END
    ===========================-->

    <!--==========================
        CATEGORY SLIDER START
    ===========================-->
    @include('frontend.home.sections.category_slider')
    <!--==========================
        CATEGORY SLIDER END
    ===========================-->


    <!--==========================
        FEATURES PART START
    ===========================-->
    @include('frontend.home.sections.features')
    <!--==========================
        FEATURES PART END
    ===========================-->


    <!--==========================
        COUNTER PART START
    ===========================-->
    @include('frontend.home.sections.counter')
    <!--==========================
        COUNTER PART END
    ===========================-->


    <!--==========================
        OUR CATEGORY START
    ===========================-->
    @include('frontend.home.sections.categories')
    <!--==========================
        OUR CATEGORY END
    ===========================-->


    <!--==========================
        OUR LOCATION START
    ===========================-->
    @include('frontend.home.sections.location')
    <!--==========================
        OUR LOCATION END
    ===========================-->


    <!--==========================
        FEATURED LISTING START 
    ===========================-->
    @include('frontend.home.sections.featured_listing')
    <!--==========================
        FEATURED LISTING END
    ===========================-->


    <!--==========================
        OUR PACKAGE START
    ===========================-->
    @include('frontend.home.sections.package')
    <!--==========================
        OUR PACKAGE END
    ===========================-->


    <!--============================
        TESTIMONIAL PART START
    ==============================-->
    @include('frontend.home.sections.testimonial')
    <!--============================
        TESTIMONIAL PART END
    ==============================-->

    <!--==========================
        BLOG PART START
    ===========================-->
    @include('frontend.home.sections.blog')
    <!--==========================
        BLOG PART END
    ===========================-->
@endsection