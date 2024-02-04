<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        // return dd($this->user_id);
        return [
            'name' =>'required|string|max:255' ,
            'username' => 'required|string|max:255',
            'email' =>'required|email',Rule::unique('users,email')->ignore($this->user_id),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'user name is required.',
            'name.string' => 'user name must be string.',
            'name.max' => 'user name must be less than 255.',
            'username.required' => 'username is required.',
            'username.string' => 'username must be string.',
            'username.max' => 'username must be less than 255.',
            'email.required' => 'email is required.',
            'email.email' => 'enter valid formate for email.',
            'email.unique' => 'this email is already exist',
        
        ];
    }
}
