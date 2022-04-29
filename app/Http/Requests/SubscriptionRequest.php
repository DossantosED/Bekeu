<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriptionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'state_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'El Email es requerido.',
            'email.email' => 'El Email es invalido.',
            'state_id.required' => 'El estado es requerido.'
        ];
    }
}