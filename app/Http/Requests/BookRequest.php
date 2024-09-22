<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;

class BookRequest extends FormRequest
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
                'title' => ['required', 'string', 'max:255'],
                'author' => ['required', 'string', 'max:255'],
                'isbn' => ['required', 'string', 'max:255', 'unique:' . Book::class . ',isbn,' . $this->id],
                'quantity' => ['required', 'integer'],
                'price' => ['required', 'numeric'],
                'pages' => ['required', 'integer'],
                'language' => ['required', 'string', 'max:255'],
                'status' => ['required', 'string', 'max:255'],
            ];
        }
        return [
            //
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'string', 'max:255', 'unique:' . Book::class],
            'quantity' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'pages' => ['required', 'integer'],
            'language' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],

        ];
    }
}
