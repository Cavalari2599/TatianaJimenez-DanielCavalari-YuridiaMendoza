<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
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
            'unidadMedida' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'categoria' => ['required', 'array'],
            'categoria.nombre' => ['required', 'string', 'max:255'],
        ];
    }
}
