<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroFormRequest extends FormRequest
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
            'placa'=>'required|max:10',
            'descripcion'=>'required|max:20',
            'modelo'=>'required|max:20',
            'num_chasis'=>'required|max:10',
            'num_motor'=>'required|max:10',
            'marca'=>'required',
            'cliente'=>'required|max:10'
        ];
    }
}
