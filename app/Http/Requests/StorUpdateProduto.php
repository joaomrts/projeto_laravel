<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorUpdateProduto extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descriçãoProduto' => ['required', 'min:5', 'max:1000'],
            'nomeProduto' => ['min:5', 'max:1000'],
            'preço' => ['required', 'numeric'],
            'imagemProduto' => ['required']
        ];
    }

    public function messages()
    {
        return[
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute deve ter menos de :max caracteres',
            'numeric' => 'O campo :attribute deve conter somente números',
            'imagemProduto' => 'O campo :attribute é obrigatório'
        ];
    }

}
