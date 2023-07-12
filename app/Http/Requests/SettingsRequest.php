<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'ar_name' => 'required|string',
            'en_name' => 'required|string',
            'app_version' => 'required|number',
            'primary_email' => 'required|email',
            'secoundary_email' => 'nullable',
            'primary_phone' => 'required',
            'secoundary_phone' => 'required|nullable',
            'ar_bio' => 'required|string',
            'en_bio' => 'required|string',
            'facebook_url' => 'nullable',
            'instagram_url' => 'nullable',
            'twitter_url' => 'nullable',
            'linkedin_url' => 'nullable',
            'ar_privacy_policy' => 'required|string',
            'en_privacy_policy' => 'required|string',
            'ar_usage_policy' => 'required|string',
            'en_usage_policy'=> 'required|string',
        ];
    }
}
