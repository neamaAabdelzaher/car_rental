<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
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
            'f_name'=>'required|string|min:3|max:40',
            'l_name'=>'required|string|min:3|max:40',
            'email'=>'required|email',
            'message'=>'required|string|min:5|max:500',
        ];
    }


    public function messages()
{
    return [
        'f_name.required' => 'first name is required.',
        'f_name.string' => 'first name must be string.',
        'f_name.max' => 'first name must be less than 40.',
        'f_name.min' => 'The first name must be at least 3 characters.',
        'l_name.required' => 'last name is required.',
        'l_name.string' => 'last name must be string.',
        'l_name.max' => 'last name must be less than 40.',
        'l_name.min' => 'The last name must be at least 3 characters.',
        'email.required' => 'email is required.',
        'email.email' => 'enter valid formate for email.',
        'message.required' => 'message is required.',
        'message.string' => 'message must be string.',
        'message.max' => 'message must be less than 500.',
        'message.min' => 'message must be at least 5 characters.',
    ];
}
}
