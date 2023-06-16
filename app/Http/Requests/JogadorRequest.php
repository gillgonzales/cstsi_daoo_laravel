<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JogadorRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules()
  {
    return [
      'nome' => 'required | string | max:50',
      'email' => 'required | email | unique:users',
      'senha' => 'required | min:8'
    ];
  }

  public function messages() 
  {
    return [
      'nome.required' => 'Nome obtigatório.',
      'nome.max' => 'Nome não deve conter mais de 50 caracteres.',
      'email.required' => 'Email obtigatório.',
      'email.email' => 'Informe um email válido.',
      'email.unique' => 'Email ja cadastrado.',
      'senha.min' => 'Senha com no mínimo 8 caracteres.',
      'senha.required' => 'Senha obtigatório.',
    ];
  }
}
