<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->segment(2);

        return [
            'name' => 'required|string|min:3|max:255',
            'email' => "required|email|unique:users,email,{$id},id",
            'cpf' => "required|unique:users,cpf,{$id},id",
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'city' => 'required',
            'state' => 'required',
            'cep' => 'required',
        ];
    }
}
