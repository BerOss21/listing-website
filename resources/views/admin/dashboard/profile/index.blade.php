@extends('admin.layouts.main')
@push('head')
<link rel="stylesheet" href="{{asset('admin/assets/modules/bootstrap-social/bootstrap-social.css')}}">
@endpush

@section('content')

<section class="section">
    <h2 class="section-title">Hi, {{auth()->user()->lastname}}!</h2>

    <p class="section-lead">
        Change information about yourself on this page.
    </p>

    <div class="row mt-sm-4">
        <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    <img alt="image" src="{{auth()->user()->avatar}}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Posts</div>
                            <div class="profile-widget-item-value">0</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Listings</div>
                            <div class="profile-widget-item-value">0</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Following</div>
                            <div class="profile-widget-item-value">0</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description">
                    <div class="profile-widget-name">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</div>
                    {!! auth()->user()->about !!}
                </div>
                <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow {{auth()->user()->lastname}} On</div>
                    <a href="{{auth()->user()->fb_link}}" class="btn btn-social-icon btn-facebook mr-1">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{auth()->user()->x_link}}" class="btn btn-social-icon btn-twitter mr-1">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{auth()->user()->insta_link}}" class="btn btn-social-icon btn-instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-7">
            <div class="card p-3 profile-card">
                <label> Informations</label>
                @include('admin.dashboard.profile.partials.informations')

                <hr/>
                <label> Change password</label>
                @include('admin.dashboard.profile.partials.password')
            </div>
        </div>
    </div>

</section>
@endsection
@push('js')
<script src="{{asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>

<script>

    $(function(){
        $('.avatar-preview').css(
            {
                'background-image':"url({{auth()->user()->avatar}})",
                'background-size': 'cover',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            }
        );
        $('.banner-preview').css(
            {
                'background-image':"url({{auth()->user()->banner}})",
                'background-size': 'cover',
                'background-position': 'center',
                'background-repeat': 'no-repeat'
            }
        );
    })
    $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });

    $.uploadPreview({
        input_field: "#image-upload-2",   // Default: .image-upload
        preview_box: "#image-preview-2",  // Default: .image-preview
        label_field: "#image-label-2",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
    });
</script>
@endpush
