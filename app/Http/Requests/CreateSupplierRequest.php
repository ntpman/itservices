<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSupplierRequest extends FormRequest
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
            'supplier_name' => ['required', 'string', 'max:255', 'unique:suppliers,supplier_name'],
            'supplier_address' => ['required', 'string', 'max:255'],
            'supplier_province_id' => ['required', 'integer',],
            'supplier_district_id' => ['required', 'integer'],
            'supplier_subdistrict_id' => ['nullable', 'integer'],
            'supplier_postcode' => ['required', 'string', 'min:5', 'max:5'],
            'supplier_phone' => ['required', 'string', 'max:255'],
            'supplier_email' => ['required', 'string', '', 'max:255'],
            'supplier_contact' => ['required', 'string', 'max:255'],
            'created_by' => ['nullable', 'string', 'max:50'],
            'updated_by' => ['nullable', 'string', 'max:50'],
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
            'supplier_name' => 'please โปรดระบุ : ชื่อผู้จำหน่ายสินค้า',
            'supplier_address' => 'please โปรดระบุ : ที่อยู่',
            'supplier_province_id' => 'please โปรดระบุ : จังหวัด',
            'supplier_district_id' => 'please โปรดระบุ : เขต/อำเภอ',
            'supplier_subdistrict_id' => 'please โปรดระบุ : แขวง/ตำบล',
            'supplier_postcode' => 'please โปรดระบุ : รหัสไปรษณีย์',
            'supplier_phone' => 'please โปรดระบุ : หมายเลขโทรศัพท์',
            'supplier_email' => 'please โปรดระบุ : อีเมล',
            'supplier_contact' => 'please โปรดระบุ : ผู้ติดต่อ',
            'created_by' => 'please โปรดระบุ : รหัสผู้สร้างข้อมูล',
            'updated_by' => 'please โปรดระบุ : รหัสผู้แก้ไขข้อมูลล่าสุด',
        ];
    }
}
