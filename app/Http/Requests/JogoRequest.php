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
      'nome' => 'required | string | max:50',
      'urlFoto' => 'required | url | max:200',
    ];
  }

  public function messages() 
  {
    return [
      'nome.required' => 'Nome obtigatório.',
      'nome.max' => 'Nome não deve conter mais de 50 caracteres.',
      'urlFoto.required' => 'URL da imagem obrigatório.',
      'urlFoto.max' => 'URL da imagem não deve conter mais de 200 caracteres.',
      'urlFoto.url' => 'Informe uma URL válida para a foto.',
    ];
  }
}