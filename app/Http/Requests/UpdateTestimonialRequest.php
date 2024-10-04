<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTestimonialRequest extends FormRequest
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
            'massage' => ['required', 'string', 'max:255'],
            'project_client_id'=>['required', 'integer'],
            'thumbnail' => ['sometimes', 'image', 'mimes:jpg,jpeg,png'],
        ];
    }
}
