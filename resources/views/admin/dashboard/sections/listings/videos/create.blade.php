@extends('admin.layouts.main')
@section('header')
<h1>Videos</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.index')}}">Listings</a></div>
    <div class="breadcrumb-item">{{$listing->title}}</div>
    <div class="breadcrumb-item active">Videos</div>
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
                    <form action="{{route('admin.sections.listings.videos.store',$listing->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-10 m-0">
                                <input class="form-control" type="text" name="url" id="video" placeholder="Video url">
                            </div>
                            <div class="form-group col-md-2 m-0">
                                <button type="submit" class="form-control btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card  mt-2">
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Url</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($listing->videos as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    @if($item->image)
                                        <img src="{{$item->image}}" width="100" alt="video{{$loop->iteration}}">
                                    @endif
                                </td>
                                <td><a href="{{$item->url}}">{{$item->url}}</a></td>
                                <td>{{$item->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <form action="{{route('admin.sections.listings.videos.destroy',['listing'=>$listing->id,'video'=>$item->id])}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="3">No video avaible</td>
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
