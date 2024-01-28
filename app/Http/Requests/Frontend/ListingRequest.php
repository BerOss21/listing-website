<?php

namespace App\Http\Requests\Frontend;

use App\Rules\MaxAmenities;
use App\Rules\MaxFeaturedListing;
use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['nullable','image', 'max:3000'],
            'thumbnail_image' => ['nullable','image', 'max:3000'],
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer','exists:categories,id'],
            'location_id' => ['required', 'integer','exists:locations,id'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'website' => ['nullable','url'],
            'facebook_link' => ['nullable','url'],
            'x_link' => ['nullable','url'],
            'linkedin_link' => ['nullable','url'],
            'whatsapp_link' => ['nullable','url'],
            'attachment' => ['nullable','mimes:png,jpg,csv,pdf', 'max:10000'],
            'amenities'=>['nullable','array',new MaxAmenities],
            'amenities.*' => ['nullable', 'integer','exists:amenities,id'],
            'description' => ['required'],
            'google_map_embed_code' => ['nullable'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'expire_date'=>['required','date'],
            'is_featured' => ['required', 'boolean',new MaxFeaturedListing],
        ];
    }
}
