<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetRequest extends FormRequest
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
            'asset_type_id' => ['required', 'integer'],
            'asset_subtype_id' => ['required', 'integer'],
            'asset_common_name_id' => ['nullable', 'integer',],
            'asset_number' => ['required', 'string', 'max:50', 'unique:assets'],
            'purchase_year' => ['required', 'string', 'max:4'],
            'brand_id' => ['required', 'integer'],
            'model_id' => ['nullable', 'integer'],
            'serial_number' => ['required', 'string', 'max:50'],
            'supplier_id' => ['required', 'integer'],
            'recived_asset' => ['required', 'date'],
            'warranty_period' => ['required', 'string', 'max:1'],
            'asset_usage_id' => ['required', 'integer'],
            'retired_asset' => ['nullable', 'date'],
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
            'asset_type_id' => 'please โปรดระบุ : รหัสประเภทครุภัณฑ์',
            'asset_subtype_id' => 'please โปรดระบุ : รหัสประเภทครุภัณฑ์ย่อย',
            'asset_common_name_id' => 'please โปรดระบุ : รหัสชื่อครุภัณฑ์',
            'asset_number' => 'please โปรดระบุ : หมายเลขครุภัณฑ์',
            'purchase_year' => 'please โปรดระบุ : ปีที่จัดซื้อ',
            'brand_id' => 'please โปรดระบุ : รหัสยี่ห้อครุภัณฑ์',
            'model_id' => 'please โปรดระบุ : รหัสรุ่นครุภัณฑ์',
            'serial_number' => 'please โปรดระบุ : หมายเลขประจำเครื่อง',
            'supplier_id' => 'please โปรดระบุ : รหัสผู้แทนจำหน่ายครุภัณฑ์',
            'recived_asset' => 'please โปรดระบุ : วันที่ตรวจรับครุภัณฑ์',
            'warranty_period' => 'please โปรดระบุ : ระยะเวลาการรับประกัน',
            'asset_usage_id' => 'please โปรดระบุ : รหัสสถานะการใช้งานครุภัณฑ์',
            'retired_asset' => 'please โปรดระบุ : วันที่แจ้งจำหน่ายครุภัณฑ์',
            'created_by' => 'please โปรดระบุ : รหัสผู้สร้างข้อมูล',
            'updated_by' => 'please โปรดระบุ : รหัสผู้แก้ไขข้อมูลล่าสุด',
        ];
    }
}
