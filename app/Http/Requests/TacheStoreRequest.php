<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TacheStoreRequest extends FormRequest
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
            'titre' => 'required|string|min:5',
            'date_debut' => 'required|date_format:Y-m-d|before:date_fin',
            'date_fin' => 'required|date_format:Y-m-d|after:date_debut',
            'description' => 'required|string',
            'personnel' => 'required|integer'
        ];
    }
    public function attributes(){
        return [
            'date_debut' => 'date de début',
            'date_fin' => 'date de fin',
        ];
    }
}
