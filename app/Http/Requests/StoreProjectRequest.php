<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\Validation\Rule;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:projects,title|max:64',
            'description' => 'required|unique:projects,title|max:64',
            'image' => 'nullable|image|max:2048',
            'type_id' => 'nullable|exists:types,id'
            // 'status' => [
            //     'required',
            //     Rule::in(['completed', 'active', 'on_hold', 'cancelled'])
            // ]
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo "Titolo" è obbligatorio.',
            'description.required' => 'Il campo "Descrizione" è obbligatorio.',
            'status.required' => 'Il campo "Stato" è obbligatorio.',
        ];
    }
}
