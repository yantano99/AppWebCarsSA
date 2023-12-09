<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteFormRequest extends FormRequest
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
            //
            'cedula'=>'required|max:10',
            'nombres'=>'required|max:20',
            'apellidos'=>'required|max:20',
            'direccion'=>'required|max:50',
            'telefono'=>'required|max:10'
        ];
    }
}
