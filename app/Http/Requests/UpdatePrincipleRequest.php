<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrincipleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'thumbnail' => ['sometimes', 'image', 'mimes:jpg,jpeg,png'],
            'icon' => ['sometimes', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }
}
