<div class="wsus__single_comment">
    <div class="wsus__single_comment_img">
        <img src="{{$review->user->avatar}}" alt="comment" class="img-fluid w-100">
    </div>
    <div class="wsus__single_comment_text">
        <h5>
            {{$review->user->firstname}} {{$review->user->lastname}}
            <span>
                @for($i=1;$i<=5;$i++) 
                    @if($i<=$review->rating)
                    <i class="fas fa-star"></i>
                    @else
                    <i class="far fa-star"></i>
                    @endif
                @endfor
            </span>
        </h5>
        <span>{{$review->created_at->format('d-M-Y')}}</span>
        <p>{{$review->content}}</p>
    </div>
</div>