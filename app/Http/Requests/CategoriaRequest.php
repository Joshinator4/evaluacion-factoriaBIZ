<?php

namespace App\Http\Requests;

use App\Models\Producto;
use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
        $cantidadProductos = Producto::count();
        return [
            'nombre'=> ['required', 'max: 255'],
            'idproductos.*'=>['nullable', 'integer', 'min:1', "max:{$cantidadProductos}"],
            'idProductoDesvincular'=>['nullable', 'integer','min:1',"max:{$cantidadProductos}"],
        ];
    }
}
