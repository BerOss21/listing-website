<div class="btn-group">
    <a href="{{route('admin.orders.show',$transaction_id)}}" class="btn btn-sm btn-primary mr-1" data-action="show">Detail</a>
    <button class="btn btn-sm btn-danger order-delete" data-url="{{route('admin.orders.destroy',$transaction_id)}}">Delete</button>
</div>
