<?php

namespace App\Http\Requests;

use App\Models\Categoria;
use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
        $cantidadCategorias = Categoria::count();
        return [
            'nombre'=> ['required', 'max: 255'],
            'descripcion' => ['required','max:1000'],
            'precio'=> ['required','min:1'],
            'stock'=> ['required','min:0'],
            'idcategorias.*'=>['nullable', 'integer', 'min:1', "max:{$cantidadCategorias}"],
            'imagenes.*'=>['nullable', 'image']
        ];
    }
}
