<?php

namespace App\Http\Requests\Frontend;

use App\Rules\UniqueReview;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content'=>['required',new UniqueReview($this->route('listing'))],
            'rating'=>['required','int','in:1,2,3,4,5']
        ];
    }
}
