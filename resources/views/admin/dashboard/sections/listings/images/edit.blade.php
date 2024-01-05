@extends('admin.layouts.main')
@section('header')
<h1>Images</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.index')}}">Listings</a></div>
    <div class="breadcrumb-item">{{$listing->title}}</div>
    <div class="breadcrumb-item active">Images</div>
</div>
@endsection

@push('head')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.sections.listings.images',$listing->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group col-md-10 m-0">
                                <input class="form-control" multiple type="file" name="images[]" id="image">
                            </div>
                            <div class="form-group col-md-2 m-0">
                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card  mt-2">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($listing->images as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    @if($item->image)
                                        <img src="{{$item->image}}" width="100" alt="image{{$loop->iteration}}">
                                    @endif
                                </td>
                                <td>{{$item->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <form action="{{route('admin.sections.listings.images.delete',['listing'=>$listing->id,'image'=>$item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="3">No image avaible</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
