<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'            =>  'required|integer',
            'comments'      =>  'required',
            'password'      =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required'           => 'Missing key/value for id',
            'id.integer'            => 'Invalid id',
            'comments.required'     => 'Missing key/value for comments',
            'password.required'     => 'Missing key/value for password'
        ];
    }
}
