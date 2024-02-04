<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
           'name'=>'required|string|min:3|max:40',
           'position'=>'required|string|min:3|max:50',
           'content'=>'required|string|min:5|max:500',
           'image' => 'required|mimes:png,jpg,jpeg|max:2048',

        ];
    }


    public function messages(){

        return[
        'name.required' => 'name is required ',
        'name.min ' => 'name must be more than 3 characters.',
        'name.max ' => 'name must be less than 40 characters.',
        'name.string ' => 'name must not be numbers',
        'position.required' => 'position is required ',
        'position.min ' => 'position must be more than 3 characters.',
        'position.max ' => 'position must be less than 50 characters.',
        'position.string ' => 'position must not be numbers',
        'content.required' => 'content is required ',
        'content.string ' => 'content must not be numbers',
        'content.min' => 'content must be more than 5 characters.',
        'content.max ' => 'content must be less than 500 characters',
        'image.required' => 'select image',
        'image.mimes' => ' image extension must be png ,jpg or jpeg',
        'image.max' => ' image max size is 2GB',
        ];
    }
}
