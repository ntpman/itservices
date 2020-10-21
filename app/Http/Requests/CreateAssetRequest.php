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
            'asset_type_id' => ['required', 'integer',],
            'asset_subtype_id' => ['required', 'integer',],
            'asset_common_name_id' => ['integer',],
            'asset_number' => ['required', 'string', 'max:50', 'unique:assets'],
            'purchase_year' => ['required', 'string', 'max:4',],
            'brand_id' => ['required', 'integer',],
            'model_id' => ['integer',],
            'serial_number' => ['required', 'string', 'max:50',],
            'supplier_id' => ['required', 'integer',],
            'recived_asset' => ['required', 'date',],
            'warranty_period' => ['required', 'string', 'max:1',],
            'asset_usage_id' => ['required', 'integer',],
            'retired_asset' => ['required', 'date',],
            'created_by' => ['required', 'string', 'max:50',],
            'updated_by' => ['required', 'string', 'max:50',],
        ];
    }
}
