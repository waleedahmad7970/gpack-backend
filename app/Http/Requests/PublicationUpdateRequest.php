<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicationUpdateRequest extends FormRequest
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
            'publication_type' => 'required',
            'title' => 'required|string|max:191',
            'author' => 'required|string|max:191',
            'summary' => 'nullable|string|max:500',
            'image' => 'sometimes|array',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'publication_type.required' => 'The publication type is required.',
            'title.required' => 'The title is required.',
            'title.max' => 'The title must be 191 characters or less.',
            'author.required' => 'The author is required.',
            'author.max' => 'The author must be 191 characters or less.',
            'summary.max' => 'The expertise must be 500 characters or less.',
            'image.*.image' => 'Each file must be an image',
            'image.*.mimes' => 'Only JPEG, PNG, JPG, GIF, and WEBP formats are allowed',
            'image.*.max' => 'Each image must be less than 2MB',
        ];
    }
}
