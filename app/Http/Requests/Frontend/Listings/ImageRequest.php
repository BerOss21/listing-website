<?php

namespace App\Http\Requests\Frontend\Listings;

use App\Rules\MaxPhotos;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'images'=>['nullable','array',new MaxPhotos($this->route('listing'))],
            'images.*'=>['image','max:5000'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        $data=data_get($this->validator->validated(), $key, $default);

        return array_map(fn($item)=>['image'=>$item],$data);
    }

    public function messages()
    {
        return [
            'images.*.image'=>'All uploaded files should be images'
        ];
    }
}
