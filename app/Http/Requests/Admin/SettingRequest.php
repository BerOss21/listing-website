<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_name'=>['sometimes','nullable','string'],
            'site_email'=>['sometimes','nullable','string'],
            'site_phone'=>['sometimes','nullable','string'],
            'site_timezone'=>['sometimes','nullable','string'],
            'site_default_currency'=>['sometimes','nullable','string'],
            'site_currency_position'=>['sometimes','nullable','string']
        ];
    }
}
