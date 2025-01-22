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
        'especie.required' => 'El nombre no puede estar vacío',
        'especie.min' => 'El nombre no puede tener menos de 3 caracteres',
        'peso.required' => 'El peso no puede ser vacío',
        'altura.required' => 'La altura no puede ser vacía',
        'fechaNacimiento.required' => 'La fecha de nacimiento no puede estar vacía',
        'fechaNacimiento.min' => 'Debe tener minimo tres digitos',
        'imagen.required' => 'Debe subir una imagen',
        'imagen.mimes' => 'Formatos válidos: jpeg, png, jpg y svg',
    ];
}

}
