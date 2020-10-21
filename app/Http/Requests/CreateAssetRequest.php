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
            'asset_subtype_id' => ['required',],
            'common_name_id' => ['required', 'integer',],
            'asset_number' => ['required', 'string', 'max:50',],
            'purchase_year' => ['required', 'string', 'max:4',],
            'brand_id' => ['required', 'integer',],
            'model_id' => ['required',],
            'serial_number' => ['required', 'string', 'max:50',],
            'supplier_id' => ['required', 'integer',],
            // 'asset_subtype_id' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ];
    }
}
