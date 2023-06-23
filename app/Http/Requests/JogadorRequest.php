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
      'nome' => 'required|string|max:50',
      'email' => 'required|email|unique:users',
      'senha' => 'required|min:8|max:25',
      'dataNasc' => 'required|date',
      'bio' => 'required|string|max:255',
      'urlFoto' => 'required|url',
      'horarioInicio' => 'required|date_format:H:i',
      'horarioFim' => 'required|date_format:H:i|after:horarioInicio',
    ];
  }

  public function messages()
  {
    return [
      'nome.required' => 'O campo nome é obrigatório.',
      'nome.string' => 'O campo nome deve ser uma string.',
      'nome.max' => 'O campo nome não deve conter mais de 50 caracteres.',
      'email.required' => 'O campo email é obrigatório.',
      'email.email' => 'Informe um email válido.',
      'email.unique' => 'Este email já está cadastrado.',
      'senha.required' => 'O campo senha é obrigatório.',
      'senha.min' => 'A senha deve ter no mínimo 8 caracteres.',
      'senha.max' => 'A senha não deve conter mais de 25 caracteres.',
      'dataNasc.required' => 'O campo data de nascimento é obrigatório.',
      'dataNasc.date' => 'Informe uma data de nascimento válida.',
      'bio.required' => 'O campo biografia é obrigatório.',
      'bio.string' => 'O campo biografia deve ser uma string.',
      'bio.max' => 'A biografia não deve conter mais de 255 caracteres.',
      'urlFoto.required' => 'O campo URL da foto é obrigatório.',
      'urlFoto.url' => 'Informe uma URL válida para a foto.',
      'horarioInicio.required' => 'O campo horário de início é obrigatório.',
      'horarioInicio.date_format' => 'Informe um horário de início válido.',
      'horarioFim.required' => 'O campo horário de fim é obrigatório.',
      'horarioFim.date_format' => 'Informe um horário de fim válido.',
      'horarioFim.after' => 'O horário de fim deve ser posterior ao horário de início.',
    ];
  }
}
