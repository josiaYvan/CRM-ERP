<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserUpdateRequest extends FormRequest
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
            'id' => [Rule::unique('users','id')->ignore($this->id, 'id')],
            'name' => ['required', 'string', 'max:255', Rule::unique('users', 'name')->ignore($this->id, 'id')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique( 'users', 'email')->ignore( $this->id, 'id')],
            'password' => ['required', 'min:8'],
            'role' => ['required', 'integer', 'max:1'],
        ];
    }
    public function attribute(){
        return [
            'name' => 'nom',
            'password' => 'mot de passe',
            'role' => 'statut'
        ];
    }
}
