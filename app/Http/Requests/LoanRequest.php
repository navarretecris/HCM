<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
        if($this->method() == 'PUT'){
            return [
                //
                'status' => ['required', 'string', 'max:255'],
            ];
        }
        return [
            //
            'status' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
            'book_id' => ['required', 'string', 'max:255'],
        ];
    }
}
