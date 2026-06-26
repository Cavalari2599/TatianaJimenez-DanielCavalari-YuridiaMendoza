<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string>>
     */
    public function rules(): array
    {
        return [
            'unidadMedida' => ['sometimes', 'required', 'string', 'max:255'],
            'descripcion' => ['sometimes', 'required', 'string', 'max:255'],
            'ubicacion' => ['sometimes', 'required', 'string', 'max:255'],
            'categoria' => ['sometimes', 'array'],
            'categoria.nombre' => ['required_with:categoria', 'string', 'max:255'],
        ];
    }
}
