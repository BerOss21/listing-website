<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    public function creating(Review $review): void
    {
        $review->user_id=auth('web')->id();
    }
}
