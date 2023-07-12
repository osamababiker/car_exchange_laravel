<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationsRequest extends FormRequest
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
            'en_name' => 'required|string',
            'ar_name' => 'required|string',
            //'organization_code' => 'required|unique:organizations',
            'primary_email' => 'required|email|unique:organizations', 
            'secoundary_email' => 'nullable',
            'primary_phone' => 'required|unique:organizations',
            'secoundary_phone' => 'nullable',
            //'logo' => 'required|file',
            //'license_image' => 'required|file',
            'en_bio' => 'required|string',
            'ar_bio' => 'required|string',
            'facebook_url' => 'nullable',
            'instagram_url' => 'nullable',
            'twitter_url' => 'nullable',
            'linkedin_url' => 'nullable',
            'country_id' => 'required',
        ];
    }
}
