<?php

namespace App\Http\Requests;

use App\Rules\Date;
use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class PersonnelRequest extends FormRequest
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
            'nom' => ['required','string','min:3','max:255',new Uppercase],
            'prenom' => ['required','string','min:3','max:255',new Uppercase],
            'date' => ['required','date_format:Y-m-d', new Date],
            'email' => 'required|email',
            'telephone' => 'required|numeric|min:10',
            'poste' => 'required',
            'image' => 'required'
        ];
    }

    public function messages() {
        return [
            "date.date_format" => "Format de date invalide: AAAA-MM-JJ",
        ];
    }
}
