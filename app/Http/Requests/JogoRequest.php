<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JogoRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules()
  {
    return [
      'name' => 'required | string | max:50',
      'urlFoto' => 'required | string | max:200',
    ];
  }

  public function messages() 
  {
    return [
      'name.required' => 'Nome obtigatório.',
      'name.max' => 'Nome não deve conter mais de 50 caracteres.',
      'urlFoto.required' => 'URL da imagem obrigatório.',
      'urlFoto.max' => 'URL da imagem não deve conter mais de 200 caracteres.',
    ];
  }
}