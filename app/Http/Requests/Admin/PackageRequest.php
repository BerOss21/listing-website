<?php

namespace App\Http\Requests\Admin;

use App\Enums\PackageType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required',Rule::enum(PackageType::class)],
            'name' => ['required','string'],
            'price' =>['required','numeric','min:0'],
            'number_of_days' => ['required','int'],
            'number_of_listings' => ['required','int'],
            'number_of_photos' => ['required','int'],
            'number_of_videos' => ['required','int'],
            'number_of_amenities' => ['required','int'],
            'number_of_featured_listings' => ['required','int'],
            'show_at_home' => ['required','boolean'],
            'status' => ['required','boolean'],
        ];
    }
}
