<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;


class UpdateCarRequest extends FormRequest
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
            'title' => 'required|between:3,255|string',Rule::unique('cars')->ignore($this->category_id),
            'price' => 'required|numeric',
            'passengers' => 'required|numeric',
            'doors' => 'required|numeric',
            'luggage' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages(){
        return [
    
    
                'title.required' => 'Car title is required ',
                'title.between ' => 'Car title must be between 3 and 255 characters.',
                'title.string ' => 'Car title must not be numbers',
                'price.required' => 'The price is required.',
                'price.numeric' => 'The price must be number.',
                'passengers.required' => 'passengers numbers is required.',
                'passengers.numeric' => 'numbers only',
                'doors.required' => 'doors numbers is required.',
                'doors.numeric' => 'numbers only.',
                'luggage.required' => 'luggage numbers required.',
                'luggage.numeric' => 'numbers only.',
                'description.required' => 'car description is required ',
                'description.string ' => 'car description must not be numbers',
                'category_id.required' => 'select Sub Category',
                'category_id.integer' => 'Category id must be integer',
                'category_id.exists' => 'Category id must exists in the table',
                'image.mimes' => ' image extension must be png ,jpg or jpeg',
                'image.max' => ' image max size is 2GB',
        ];
    
    
        }
}
