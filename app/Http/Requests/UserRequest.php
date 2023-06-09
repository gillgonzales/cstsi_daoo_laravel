<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules()
  {
    return [
      'name' => 'required | string | max:50',
      'email' => 'required | email | unique:users',
      'password' => 'required | min:8'
    ];
  }

  public function messages() 
  {
    return [
      'name.required' => 'Nome obtigatório.',
      'name.max' => 'Nome não deve conter mais de 50 caracteres.',
      'email.required' => 'Email obtigatório.',
      'name.email' => 'Informe um email válido.',
      'name.unique' => 'Email ja cadastrado.',
      'password.min' => 'Senha com no mínimo 8 caracteres.',
      'email.required' => 'Senha obtigatório.',
    ];
  }
}
