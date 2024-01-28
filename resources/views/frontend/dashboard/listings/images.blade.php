@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<div class="my_listing p_xm_0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('dashboard.listings.images.store',$listing->slug)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <span class="text-danger">(max:{{$max_photos}})</span>
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
                <div class="card-body table-responsive">
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
                                <td style="width:40% !important">
                                    @if($item->image)
                                    <img src="{{$item->image}}" style="width:50% !important" alt="image{{$loop->iteration}}">
                                    @endif
                                </td>
                                <td>{{$item->created_at->format('d/m/Y')}}</td>
                                <td>
                                    <form action="{{route('dashboard.listings.images.destroy',[$listing->slug,$item->id])}}" method="post">
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