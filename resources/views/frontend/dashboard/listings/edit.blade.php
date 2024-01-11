@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<form method="POST" action="{{ route('dashboard.listings.update',$listing->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('frontend.dashboard.listings.partials.edit.main')
    @include('frontend.dashboard.listings.partials.edit.description')
    @include('frontend.dashboard.listings.partials.edit.amenities')
    @include('frontend.dashboard.listings.partials.edit.social_links')
    @include('frontend.dashboard.listings.partials.edit.seo')
    <div class="col-xl-12 w-100 d-flex justify-content-end">
        <button type="submit" class="btn_submit mt-1">save</button>
    </div>
</form>
@endsection
@push('dashboard_head')
<style>
    .image-preview {
        width: 250px;
        height: 250px;
        border: 2px dashed #ddd;
        border-radius: 3px;
        position: relative;
        overflow: hidden;
        background-color: #ffffff;
        color: #ecf0f1;
    }

    .image-preview input {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }

    .image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 150px;
        height: 50px;
        font-size: 12px;
        line-height: 50px;
        text-transform: uppercase;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
        text-align: center;
    }
</style>
@endpush

@push('dashboard_js')
<script src="{{asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>

<script>
    $(function() {
        $('.image-preview').css({
            'background-image': "url({{$listing->image}})",
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat'
        });

        $('.thumbnail-preview').css({
            'background-image': "url({{$listing->thumbnail_image}})",
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat'
        });
    })

    $.uploadPreview({
        input_field: "#image-upload",
        preview_box: "#image-preview",
        label_field: "#image-label",
        label_default: "Choose File",
        label_selected: "Change File",
        no_label: false,
        success_callback: null
    });

    $.uploadPreview({
        input_field: "#thumbnail-upload",
        preview_box: "#thumbnail-preview",
        label_field: "#thumbnail-label",
        label_default: "Choose File",
        label_selected: "Change File",
        no_label: false,
        success_callback: null
    });
</script>
@endpush