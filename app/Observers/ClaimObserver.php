<?php

namespace App\Observers;

use App\Models\Claim;

class ClaimObserver
{
    public function creating(Claim $claim): void
    {
        $claim->user_id=auth('web')->id();
    }
}
