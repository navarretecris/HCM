<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            return [
                //
                'name' => ['required', 'string', 'max:255'],
                'document_type' => ['required', 'string', 'max:255'],
                'document' => ['required', 'string', 'max:255', 'unique:' . User::class . ',document,' . $this->id],
                'id_card' => ['required', 'string', 'max:255'],
                'role' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $this->id],
            ];
        }
        return [
            //
            'name' => ['required', 'string', 'max:255'],
            'document_type' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'id_card' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
        ];
    }
}
