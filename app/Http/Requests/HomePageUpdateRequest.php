<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageUpdateRequest extends FormRequest
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
            'title' => 'required|string|max:191',
            'subtitle' => 'required|string|max:191',
            'banner_image' => 'sometimes|array',
            'banner_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'teams' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'title.max' => 'The title must be 191 characters or less.',
            'subtitle.required' => 'The subtitle is required.',
            'subtitle.max' => 'The subtitle must be 191 characters or less.',
            'teams.required' => 'The team members are required.',
            'teams.min' => 'Please select atleast 1 team member',
            'banner_image.*.image' => 'Each file must be an image',
            'banner_image.*.mimes' => 'Only JPEG, PNG, JPG, GIF, and WEBP formats are allowed',
            'banner_image.*.max' => 'Each image must be less than 2MB',
        ];
    }
}
