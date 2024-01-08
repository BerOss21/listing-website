<?php

namespace App\Http\Requests\Admin\Listing;

use App\Enums\Days;
use Illuminate\Validation\Rule;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;

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
        $rules= [
            'day'=>['sometimes','required',Rule::enum(Days::class)],
            'start_time'=>['required','date_format:H:i','max:20'],
            'end_time'=>['required','date_format:H:i','after:start_time','max:20'],
            'status'=>['required','string','boolean']
        ];

        $rules['day'][]=$this->route('schedule')?
        Rule::unique('schedules')->where(fn (Builder $query) => $query->where('listing_id', $this->listing->id))->ignore($this->route('schedule'))
        :Rule::unique('schedules')->where(fn (Builder $query) => $query->where('listing_id', $this->listing->id));
        
        return $rules;
    }
}
