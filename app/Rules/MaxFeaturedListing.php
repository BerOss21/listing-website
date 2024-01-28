<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxFeaturedListing implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(auth()->user()->listings()->where('is_featured',true)->count() >= auth()->user()->latestOrder->package->number_of_featured_listings )
        {
            $fail('You have exeeded the maximum number of featured listings');
        }
    }
}
