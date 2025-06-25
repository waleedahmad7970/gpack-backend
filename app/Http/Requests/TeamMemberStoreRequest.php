<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberStoreRequest extends FormRequest
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
            'prefix' => 'required|string',
            'name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'expertise' => 'required|string|max:191',
            'member_type' => 'required|string',
            'fields' => 'required|array|min:1',
            'profile_url' => 'nullable|url',
            'profile_image' => 'required|array|min:1',
            'profile_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.max' => 'The name must be 191 characters or less.',
            'designation.required' => 'The designation is required.',
            'designation.max' => 'The designation must be 191 characters or less.',
            'expertise.required' => 'The expertise is required.',
            'expertise.max' => 'The expertise must be 191 characters or less.',
            'member_type.required' => 'The member type is requried.',
            'fields.required' => 'The fields is required.',
            'fields.min' => 'Please select atleast 1 field',
            'profile_image.required' => 'The profile image is required.',
            'profile_image.*.image' => 'Each file must be an image',
            'profile_image.*.mimes' => 'Only JPEG, PNG, JPG, GIF, and WEBP formats are allowed',
            'profile_image.*.max' => 'Each image must be less than 2MB',
        ];
    }
}
