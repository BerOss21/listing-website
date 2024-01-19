<div class="btn-group">
    <a href="{{route('admin.payment_methods.edit',$slug)}}" class="btn btn-sm btn-primary mr-1" data-action="edit">Edit</a>
    <button class="btn btn-sm btn-danger payment_method-delete" data-url="{{route('admin.payment_methods.destroy',$slug)}}">Delete</button>
</div>
