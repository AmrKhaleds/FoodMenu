<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'digits_between:10,11'],
            'request_type' => ['required', 'string', 'in:resturant,delivery'], // replace with your valid types
            'menu' => ['required', 'array', 'min:1'], // menu is an array of integers
            'menu.*' => ['required', 'numeric', 'exists:products,id'], // replace with your menu table name
        ];
    }

    public function messages()
    {
        return [
            'menu.required' => "يجب إضافة منتجات الى قائمة الحجز اولاً",
            'name.required' => "لا يجب ترك خانة الأسم فارغه",
            'phone.required' => "لا يجب ترك خانة التلفون فارغه",
            'request_type.required' => "لا يجب ترك خانة نوع الطلب فارغه",
            'email.required' => "لا يجب ترك خانة الإيميل فارغه",
            'phone.digits_between' => "خانة التلفون يجب ان تحتوى على عدد ارقام من 10 الى 11 رقم",

        ];
    }
}
