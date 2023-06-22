<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'order_user_name' => 'required|string|max:255',
            'order_user_email' => 'required|email|max:255',
            'order_user_phone' => ['required','digits_between:10,11', 'regex:/^(010|011|012|015)\d{8}$/'],
            'order_user_address' => 'required|string|max:1000',
            'order_user_city' => 'required|numeric',
            'order_user_place' => 'required|numeric',
        ];
    }
}
