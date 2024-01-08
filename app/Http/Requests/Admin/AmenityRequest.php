<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AmenityRequest extends FormRequest
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
            'name'=>['required','string','max:255'],
            'icon'=>['required','string'],
            'show_at_home'=>['nullable','boolean'],
            'status'=>['nullable','boolean'],
        ];

        $rules['name'][]=$this->route('amenity')?
                        Rule::unique('amenities')->ignore($this->route('amenity'))
                        :Rule::unique('amenities');
                        
        return $rules;
    }
}
