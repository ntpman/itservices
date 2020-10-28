<?php

namespace App\Http\Requests\Assets;

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
            'type_id' => ['required', 'integer'],
            'subtype_id' => ['nullable', 'integer'],
            'brand_id' => ['required', 'integer',],
            'brand_model_id' => ['nullable', 'integer'],
            'common_id' => ['required', 'integer'],
            'usage_id' => ['required', 'integer'],
            'supplier_id' => ['required', 'integer'],
            'asset_number' => ['required', 'string', 'max:50', 'unique:assets,asset_number'],
            'asset_serial_number' => ['required', 'string', 'max:50', 'unique:assets,asset_serial_number'],
            'asset_purchase_year' => ['required', 'string', 'min:4', 'max:4'],
            'asset_warranty_period' => ['required', 'string', 'max:50'],
            'asset_recived' => ['required', 'date'],
            'asset_retired' => ['nullable', 'date'],
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
            // 'name' => 'please โปรดระบุ : ?',
        ];
    }
}
