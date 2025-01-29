<?php

namespace App\Http\Requests;
use  App\Models\Animal;
use Illuminate\Foundation\Http\FormRequest;

class CrearRevisionRequest extends FormRequest
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
            'fecha'=>'required|date',
            'descripcion'=>'required|string|min:5|max:1000'
        ];
    }
    public function messages()
    {
        return [
            'fecha.required'=>'Este campo es obligatorio',
            'fecha.date'=>'El campo de fecha debe tener formato de fecha',
            'descripcion.required'=>'Este campo es obligatorio',
            'descripcion.string'=>'Solo se permite texto',
            'descripcion.min'=>'Caracteres mínimos:5',
            'descripcion.max'=>'Caracteres máximos:1000',
        ];
    }
}
