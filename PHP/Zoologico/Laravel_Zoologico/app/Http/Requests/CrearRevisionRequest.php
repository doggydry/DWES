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
        $animal = Animal::findOrFail($this->route('slug'));
        $fechaNacimiento = $animal->fechaNacimiento;
        return [
            'fecha'=>'required|date|after_or_equal:$fechaNacimiento',
            'descripcion'=>'required|string|min:5|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'fecha.required'=>'Este campo es obligatorio',
            'fecha.date'=>'El campo de fecha debe tener formato de fecha',
            'fecha.after_or_equal'=>'La revision no puede ser anterior al nacimiento del animal',
            'descripcion.required'=>'Este campo es obligatorio',
            'descripcion.string'=>'Solo se permite texto',
            'descripcion.min'=>'Caracteres mínimos:5',
            'descripcion.max'=>'Caracteres máximos:1000',

        ];
    }
}
