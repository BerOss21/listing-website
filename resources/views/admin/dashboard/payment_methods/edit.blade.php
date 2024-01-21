@extends('admin.layouts.main')
@section('header')
<div class="section-header-back">
    <a href="{{route('admin.payment_methods.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
</div>
<h1>Payment Methods</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Payment Methods</div>
    <div class="breadcrumb-item active">{{$payment_method->name}}</div>
</div>
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Payment method data</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.payment_methods.update',$payment_method->slug) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset>
                            <h3>General</h3>
                            <div class="row">
                                <div class="form-group col-md-12 mb-4">
                                    <label class="">Icon</label>
                                    <div id="icon-preview" class="image-preview icon-preview">
                                        <label for="icon-upload" id="icon-label">Choose File</label>
                                        <input type="file" name="icon" id="icon-upload" />
                                    </div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="{{old('name',$payment_method->name)}}" readonly>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1" @selected(old('status',$payment_method->status)==true)>Active</option>
                                        <option value="0" @selected(old('status',$payment_method->status)==false)>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description',$payment_method->description)}}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <h3>Config</h3>
                            @foreach($options as $key=>$option)
                                <div class="form-group col-md-6 mb-4">
                                    <label>{{$option['label']}}</label>
                                    <input type="text" name="configuration[{{$option['name']}}]" class="form-control" value="{{$payment_method['config'][$key] ?? null}}">
                                </div>
                            @endforeach
                        </fieldset>
                        
                        <div class="form-group col-md-12 mb-4">
                            <label></label>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    $(function() {
        $('.icon-preview').css({
            'background-image': "url({{$payment_method->icon}})",
            'background-size': 'cover',
            'background-position': 'center',
            'background-repeat': 'no-repeat'
        });
    })


    $.uploadPreview({
        input_field: "#icon-upload",
        preview_box: "#icon-preview", 
        label_field: "#icon-label", 
        label_default: "Choose File",
        label_selected: "Change File", 
        no_label: false, 
        success_callback: null 
    });
</script>
@endpush