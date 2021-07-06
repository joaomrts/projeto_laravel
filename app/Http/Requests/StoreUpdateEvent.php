<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateEvent extends FormRequest
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
            'evento' => ['required', 'min:3',],
            'data' => ['required'],
            'cidade' => ['required', 'min:5'],
            'descrição' => ['required', 'min:5', 'max:1000']
        ];
    }

    public function messages()
    {
        return[
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
            'required' => 'O campo :attribute é obrigatório',
            'max' => 'O campo :attribute deve ter menos de :max caracteres'
        ];
    }

}
