<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar jogador</title>
</head>
<body>
  @if ($jogador)
    <h1>{{ $jogador->nome }}</h1>
    <p>{{ $jogador->bio }}</p>
    <ul>
      <li>email: {{ $jogador->email }}</li>
      <li>Data de nascimento: {{ $jogador->dataNasc }}</li>
      <li>Foto: {{ $jogador->urlFoto }}</li>
      <li>Horario de inicio que mais joga: {{ $jogador->horarioInicio }}</li>
      <li>Horario fim: {{ $jogador->HorarioFim }}</li>
    </ul>
    <table>
      <tr>
        <td>
          <form action="{{ route('jogador.remove',$jogador->id) }}" method='post'>
            @csrf
            <input type="submit" name='confirmar' value="Remover" />
          </form>
        </td>
        <td>
          <a href="/jogadores"><button>Cancelar</button></a>
          </td>
      </tr>
    </table>
  @else
      <p>Jogador não encontrado! </p>
  @endif
  <a href="/jogadores">&#9664;Voltar</a>
</body>
</html>