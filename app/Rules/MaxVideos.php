<?php

namespace App\Rules;

use App\Models\Listing;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxVideos implements ValidationRule
{

    public function __construct(protected Listing $listing) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->listing->videos()->count() >= auth()->user()->latestOrder->package->number_of_videos)
        {
            $fail('You have exeeded the maximum number of videos for this listing');
        }
    }
}
