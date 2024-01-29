<?php

namespace App\Rules;

use Closure;
use App\Models\Listing;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueReview implements ValidationRule
{
    public function __construct(protected Listing $listing) {}
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->listing->reviews()->where('user_id',auth()->id())->count())
        {
            $fail('You have already review this listing');
        }
    }   
}
