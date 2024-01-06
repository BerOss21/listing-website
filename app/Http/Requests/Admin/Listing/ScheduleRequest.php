<?php

namespace App\Http\Requests\Admin\Listing;

use App\Enums\Days;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ScheduleRequest extends FormRequest
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
            'day'=>['required',Rule::enum(Days::class)],
            'start_time'=>['required','string','max:20'],
            'end_time'=>['required','string','max:20'],
            'status'=>['required','boolean']
        ];
    }
}
