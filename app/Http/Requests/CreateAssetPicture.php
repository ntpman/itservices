<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAssetPicture extends FormRequest
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
            'picture_name' => ['required', 'string', 'unique:asset_pictures'],
            'created_by' => ['nullable', 'string', 'max:50'],
            'updated_by' => ['nullable', 'string', 'max:50'],
        ];
    }
}
