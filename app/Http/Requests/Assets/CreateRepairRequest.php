<?php

namespace App\Http\Requests\Assets;

use Illuminate\Foundation\Http\FormRequest;

class CreateRepairRequest extends FormRequest
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
            'repair_date' => ['required', 'date'],
            'repair_list' => ['required', 'string', 'max:255'],
            'repairer_name' => ['required', 'string', 'max:255'],
            'repairer_org' => ['required', 'string', 'max:255'],
            'repair_comment' => ['required', 'string'],
            'created_by' => ['nullable', 'string', 'max:50'],
            'updated_by' => ['nullable', 'string', 'max:50'],
        ];
    }
}
