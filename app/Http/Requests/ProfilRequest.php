<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
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
            'name' => ['required','string','min:3','max:255',new Uppercase],
            'first_name' => ['required','string','min:3','max:255',new Uppercase],
            'email' => ['required', 'email'],
            'telephone' => ['required','numeric', 'min:10'],
            'biography' => ['required', 'max:2456', 'min:3'],
            'image' => ['image', 'mimes:png,jpg'],
        ];
    }
}
