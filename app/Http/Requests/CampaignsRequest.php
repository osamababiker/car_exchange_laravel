<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'en_title' => 'required|string',
            'ar_title' => 'required|string',
            'primary_phone' => 'required',
            'secoundary_phone' => 'nullable',
            'en_content' => 'required|string',
            'ar_content' => 'required|string',
            'target' => 'required|integer',
            'currancy_id' => 'required',
            'country_id' => 'required',
            'category_id' => 'required',
            'organization_id' => 'required',
            //'image' => 'required|file'
        ];
    }
}
