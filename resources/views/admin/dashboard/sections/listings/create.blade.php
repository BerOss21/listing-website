@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="{{ route('admin.sections.listings.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Listings</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
    <div class="breadcrumb-item">Listings</div>
    <div class="breadcrumb-item active">Create</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Listing Data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sections.listings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-4">
                                <label class="">Image</label>
                                <div id="image-preview" class="image-preview background-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label class="">Thumbnail</label>
                                <div id="thumbnail-preview" class="image-preview thumbnail-preview">
                                    <label for="thumbnail-upload" id="thumbnail-label">Choose File</label>
                                    <input type="file" name="thumbnail_image" id="thumbnail-upload" />
                                </div>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id')==$category->id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Location</label>
                                <select name="location_id" class="form-control select2">
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}" @selected(old('location_id')==$location->id)>{{ $location->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Description</label>
                                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Google map embed code</label>
                                <textarea name="google_map_embed_code" class="form-control">{{ old('google_map_embed_code') }}</textarea>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            </div>

                            
                            <div class="form-group col-md-6 mb-4">
                                <label>Amenities</label>
                                <select name="amenities[]" class="form-control w-100 select2" multiple>
                                    @foreach($amenities as $amenity)
                                        <option value="{{ $amenity->id }}" {{ in_array($amenity->id, old('amenities', [])) ? 'selected' : '' }}>
                                            {{ $amenity->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Website</label>
                                <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Facebook Link</label>
                                <input type="text" name="facebook_link" class="form-control" value="{{ old('facebook_link') }}">
                            </div>

                             <div class="form-group col-md-6 mb-4">
                                <label>X Link</label>
                                <input type="text" name="x_link" class="form-control" value="{{ old('x_link') }}">
                            </div>
                
                            <div class="form-group col-md-6 mb-4">
                                <label>Linkedin Link</label>
                                <input type="text" name="linkedin_link" class="form-control" value="{{ old('linkedin_link') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Whatsapp Link</label>
                                <input type="text" name="whatsapp_link" class="form-control" value="{{ old('whatsapp_link') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @selected(old('status')==true)>Active</option>
                                    <option value="0"  @selected(old('status')==false)>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Is verified</label>
                                <select name="is_verified" class="form-control">
                                    <option value="1"  @selected(old('is_verified')==true)>Active</option>
                                    <option value="0" @selected(old('is_verified')==false)>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Is featured</label>
                                <select name="is_featured" class="form-control">
                                    <option value="1" @selected(old('is_featured')==true)>Active</option>
                                    <option value="0"  @selected(old('is_featured')==false)>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Is approved</label>
                                <select name="is_approved" class="form-control">
                                    <option value="1"  @selected(old('is_approved')==true)>Active</option>
                                    <option value="0" @selected(old('is_approved')==false)>Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Expire Date</label>
                                <input type="date" name="expire_date" class="form-control" value="{{ old('expire_date') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Seo title</label>
                                <input type="text" name="seo_title" class="form-control" value="{{ old('seo_title') }}">
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <label>Seo description</label>
                                <input type="text" name="seo_description" class="form-control" value="{{ old('seo_description') }}">
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <label>Attachment</label>
                                <input type="file" name="attachment" class="form-control">
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <label></label>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js')}}"></script>

<script>

    $(document).ready(function() {
        $('.select2').select2();
    });

    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });

    $.uploadPreview({
        input_field: "#thumbnail-upload", // Default: .thumbnail-upload
        preview_box: "#thumbnail-preview", // Default: .thumbnail-preview
        label_field: "#thumbnail-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>
@endpush