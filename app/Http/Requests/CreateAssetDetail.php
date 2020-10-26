<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetDetail extends FormRequest
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
            'asset_id' => ['required', 'integer'],
            'asset_detail' => ['required', 'string'],
            'amont' => ['required', 'string', 'max:50'],
            'comment' => ['nullable', 'string'],
            'created_by' => ['nullable', 'string', 'max:50'],
            'updated_by' => ['nullable', 'string', 'max:50'],
        ];
    }
}
