<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhyPageUpdateRequest extends FormRequest
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
            'ceo_name' => 'required|string|max:191',
            'ceo_message' => 'required|string|min:10',
            'ceo_image' => 'sometimes|array',
            'ceo_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'teams' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'ceo_name.required' => 'The ceo name is required',
            'ceo_name.max' => 'The ceo name must be 191 characters or less.',
            'ceo_message.required' => 'The ceo message is required.',
            'ceo_message.min' => 'The ceo message must be 10 characters or more.',
            'teams.required' => 'The team members are required.',
            'teams.min' => 'Please select atleast 1 team member',
            'ceo_image.*.image' => 'Each file must be an image',
            'ceo_image.*.mimes' => 'Only JPEG, PNG, JPG and GIF formats are allowed',
            'ceo_image.*.max' => 'Each image must be less than 2MB',
        ];
    }
}
