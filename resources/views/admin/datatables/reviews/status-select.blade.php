<select name="approved" class="form-control review_status" data-url="{{route('admin.sections.reviews.update',$review->id)}}">
    <option value="1" @selected($review->approved==true)>Approved</option>
    <option value="0"  @selected($review->approved==false)>Pending</option>
</select>