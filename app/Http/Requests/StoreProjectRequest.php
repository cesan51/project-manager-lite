<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name'          => ['required', 'string', 'max:50'],
            'description'   => ['nullable' ,'string', 'max:255'],
            'status'        => ['required', 'string', 'in:planing,in_progress,delayed,completed'],
            'start_date'    => ['nullable','date', 'date_format:Y-m-d', 'after_or_equal:today'],
            'end_date'      => ['nullable','date', 'date_format:Y-m-d', 'after_or_equal:start_date']
        ];
    }
}
