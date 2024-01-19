<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'description'=>['nullable','string'],
            'icon'=>['nullable','image','max:2000'],
            'status'=>['nullable','boolean'],
            'config'=>['required','array']
        ];
    }
}
