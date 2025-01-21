<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;



class CrearAnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'especie'=>'required|min:3',
            'peso'=>'required',
            'altura'=>'required',
            'fechaNacimiento'=>'required|min:3',

            'imagen'=>'required|mimes:jpeg,png,jpg,svg'
        ];
    }

    public function messages()
    {
        return [
            'especie.required'=>'El nombre no puede ser vacio ni tener menos de 3 caracteres',
            'peso'=>'El peso no puede ser vacio',
            'altura'=>'El altura no puede ser vacio',
            'fechaNacimiento'=>'La fecha de nacimiento no puede estar vacia',
            'imagen'=>'Formatos validos: jpeg,png,jpg y svg. No puede estar vacío',



        ];
    }
}
