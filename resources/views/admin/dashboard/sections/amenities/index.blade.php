@extends('admin.layouts.main')
@section('header')
<h1>Amenities</h1>
<div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></div>
    <div class="breadcrumb-item">Section</div>
    <div class="breadcrumb-item active">Amenities</div>
</div>
@endsection

@push('head')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}"> -->
@endpush

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>Amenity section data</h4>
                </div> -->
                <div class="card-body">
                    <div class="w-full d-flex justify-content-end mb-5">
                        <a href="{{route('admin.sections.amenities.create')}}" class="btn btn-primary self-end">Create</a>
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

  <!-- <script src="{{asset('admin/assets/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
  <script src="{{asset('admin/assets/modules/jquery-ui/jquery-ui.min.js')}}"></script> -->

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}

<script>
    const table= $('#amenities-table');

    $(document).on('click', '.amenity-delete', async function(e) {
        e.preventDefault();

        try
        {
            const willDelete=await swal({
                title: 'Are you sure?',
                text: 'Once deleted, you will not be able to recover this amenity!',
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
                    title: 'Amenity deleted successfully',
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