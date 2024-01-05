<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ListingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules=[
            'image' => ['image', 'max:3000'],
            'thumbnail_image' => [ 'image', 'max:3000'],
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
            'amenities'=>['nullable','array'],
            'amenities.*' => ['nullable', 'integer','exists:amenities,id'],
            'description' => ['required'],
            'google_map_embed_code' => ['nullable'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'boolean'],
            'expire_date'=>['required','date'],
            'is_featured' => ['required', 'boolean'],
            'is_verified' => ['required', 'boolean'],
            'is_approved' => ['required', 'boolean'],
        ];

        $rules['title'][]=$this->route('listing')?
                        Rule::unique('listings')->ignore($this->route('listing'))
                        :Rule::unique('listings');
                        
        return $rules;
    }
}
