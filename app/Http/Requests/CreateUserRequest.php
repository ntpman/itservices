<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png'],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'โปรดระบุ : ชื่อผู้ใช้งาน',
            'email' => 'โปรดระบุ : อีเมล์สำหรับ Login เข้าใช้งานระบบ',
            'password' => 'โปรดระบุ : รหัสผ่าน',
            'image' => 'โปรดระบุ : ตรวจสอบไฟล์รูปภาพ',
        ];
    }
}
