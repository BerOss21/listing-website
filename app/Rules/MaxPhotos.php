<?php

namespace App\Rules;

use Closure;
use App\Models\Listing;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxPhotos implements ValidationRule
{
    public function __construct(protected Listing $listing) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(($this->listing->images()->count() + count($value)) > auth()->user()->latestOrder->package->number_of_photos)
        {
            $fail('You have exeeded the maximum number of photos for this listing');
        }
    }
}
