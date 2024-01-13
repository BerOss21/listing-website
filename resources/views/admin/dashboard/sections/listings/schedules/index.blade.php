@extends('admin.layouts.main')
@section('header')
<h1>Schedules</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item"><a href="{{route('admin.sections.listings.index')}}">Listings</a></div>
    <div class="breadcrumb-item">{{  $listing->title }}</div>
    <div class="breadcrumb-item active">Schedules</div>
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
                    <div class="w-full d-flex justify-content-end mb-5">
                        <a href="{{route('admin.sections.listings.schedules.create',$listing->slug)}}" class="btn btn-primary self-end">Create</a>
                    </div>
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    const table= $('#schedules-table');

    $(document).on('click', '.schedule-delete', async function(e) {
        e.preventDefault();

        try
        {
            const willDelete=await swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this schedule!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })

            if (willDelete) {
                await $.ajax({
                    url: $(this).data('url'),
                    method: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                });

                iziToast.success({
                    title: 'Schedule deleted successfully',
                    position: 'topRight'
                });
        
                table.DataTable().ajax.reload();
            }
        }
        catch(error)
        {
            console.log("error",error);
        }
    })
</script>
@endpush