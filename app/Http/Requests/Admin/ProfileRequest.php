<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        return [
            'firstname'=>['sometimes','required','string','max:255'],
            'lastname'=>['sometimes','required','string','max:255'],
            'email'=>['sometimes','required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(Admin::class)->ignore($this->user()->id)],
            'avatar'=>['sometimes','nullable','image','max:3000'],
            'banner'=>['sometimes','nullable','image','max:3000'],
            'phone'=>['sometimes','nullable','string','max:10'],
            'address'=>['sometimes','nullable','string','max:255'],
            'about'=>['sometimes','nullable','string','max:500'],
            'website'=>['sometimes','nullable','url'],
            'fb_link'=>['sometimes','nullable','url'],
            'x_link'=>['sometimes','nullable','url'],
            'in_link'=>['sometimes','nullable','url'],
            'wa_link'=>['sometimes','nullable','url'],
            'insta_link'=>['sometimes','nullable','url'],
            'current_password'=>['required_with:password','current_password'],
            'password'=>['sometimes','required','confirmed']
        ];
    }

    
    /**
     * Get the validated data from the request.
     *
     * @param  array|int|string|null  $key
     * @param  mixed  $default
     * @return mixed
     */
    // public function validated($key = null, $default = null)
    // {
    //     $data=data_get($this->validator->validated(), $key, $default);

    //     if(!($data['password'] ?? null)) unset($data['password']);

    //     return $data;
    // }
}
