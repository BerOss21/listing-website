@extends('frontend.dashboard.layouts.main')
@section('dashboard_content')
<div class="my_listing p_xm_0">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="w-full d-flex justify-content-end mb-5">
                        <a href="{{route('dashboard.listings.schedules.create',$listing->id)}}" class="btn btn_submit self-end"><i class="far fa-plus"></i> Add schedule</a>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Start time</th>
                                    <th scope="col">End time</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($listing->schedules as $item)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$item->day}}</td>
                                    <td>{{$item->start_time}}</td>
                                    <td>{{$item->end_time}}</td>
                                    <td>
                                        <div class="d-flex justify-center align-items-center">
                                            @if($item->status==1)
                                            <span class='bg-success text-white p-1 rounded'>Yes</span>
                                            @else
                                            <span class='bg-warning p-1 rounded'>No</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                                    <td class="w-20 d-flex">
                                        <a href="{{route('dashboard.listings.schedules.edit',[$listing->id,$item->id])}}" class="btn btn-success mx-1">Edit</a>
                                        <form action="{{route('dashboard.listings.schedules.destroy',[$listing->id,$item->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="7">No schedule avaible</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection