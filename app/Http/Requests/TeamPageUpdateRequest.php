<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamPageUpdateRequest extends FormRequest
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
            'teams' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'teams.required' => 'The team members are required.',
            'teams.min' => 'Please select atleast 1 team member',
        ];
    }
}
