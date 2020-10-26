<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetOwnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            'owner_name' => ['required', 'string', 'max:150'],
            'owner_started' => ['nullable', 'date'],
            'owner_ended' => ['nullable', 'date'],
            'created_by' => ['nullable', 'string', 'max:50'],
            'updated_by' => ['nullable', 'string', 'max:50'],
        ];
    }
}
