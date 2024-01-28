<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxAmenities implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(count($value) > auth()->user()->latestOrder->package->number_of_amenities)
        {
            $fail('You have exeeded the maximum number of amenities for this listing');
        }
    }
}
