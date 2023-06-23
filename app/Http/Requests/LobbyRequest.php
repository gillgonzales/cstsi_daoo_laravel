<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LobbyRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules()
  {
    return [
      'nome' => 'required|string|max:50',
      'maxJogadores' => 'required|integer',
      'convidar' => 'required|boolean',
      'senha' => 'required|max:25',
      'jogador_id' => 'required|exists:jogadores,id',
      'jogo_id' => 'required|exists:jogos,id',
    ];
  }

  public function messages()
  {
    return [
      'nome.required' => 'O campo nome é obrigatório.',
      'nome.string' => 'O campo nome deve ser uma string.',
      'nome.max' => 'O campo nome não deve conter mais de 50 caracteres.',
      'maxJogadores.required' => 'O campo maxJogadores é obrigatório.',
      'maxJogadores.integer' => 'O campo maxJogadores deve ser um número inteiro.',
      'convidar.required' => 'O campo convidar é obrigatório.',
      'convidar.boolean' => 'O campo convidar deve ser um valor booleano.',
      'senha.required' => 'O campo senha é obrigatório.',
      'senha.max' => 'A senha não deve conter mais de 25 caracteres.',
      'jogador_id.required' => 'O campo jogador_id é obrigatório.',
      'jogador_id.exists' => 'O jogador selecionado é inválido.',
      'jogo_id.required' => 'O campo jogo_id é obrigatório.',
      'jogo_id.exists' => 'O jogo selecionado é inválido.',
    ];
  }
}
