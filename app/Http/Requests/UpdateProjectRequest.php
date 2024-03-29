<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required', 'min:3', 'max:255', Rule::unique('projects')->ignore($this->project)],
            'body'=> ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'technologies' => ['exists:technologies,id'],
            'image'=> ['nullable', 'image'],
            'image_alternative'=> ['nullable', 'image']
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.unique' => 'Il progetto con questo titolo è già esistente',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'image.image' => 'L\'image non è valido',
            'image_alternative.image' => 'L\'image alternativa non è valido'
        ];
    }
}
