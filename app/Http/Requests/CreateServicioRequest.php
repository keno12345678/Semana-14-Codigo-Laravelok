<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServicioRequest extends FormRequest
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
            'titulo' => 'required|string|max:255',
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'descripcion' => 'required|string',
            'image' => [
                $this->isMethod('post') ? 'required' : 'nullable',
                'mimes:jpeg,png,jpg',
                'max:2048'
            ],
        ];
    }
    public function messages()
    {
        return [
            'titulo.required' => 'El título es requerido',
            'category_id.required' => 'Seleccione una categoria para el servicio',
            'descripcion.required' => 'La descripción es requerida',
            'image.required' => 'La imagen es obligatoria.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg.',
            ];
    }
}
