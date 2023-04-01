<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar jogo</title>
</head>
<body>
  @if ($jogo)
    <h1>{{ $jogo->nome }}</h1>
    <ul>
      <li>Foto: {{ $jogo->urlFoto }}</li>
    </ul>
    <table>
      <tr>
        <td>
          <form action="{{ route('jogo.remove',$jogo->id) }}" method='post'>
            @csrf
            <input type="submit" name='confirmar' value="Remover" />
          </form>
        </td>
        <td>
          <a href="/jogos"><button>Cancelar</button></a>
          </td>
      </tr>
    </table>
  @else
      <p>Jogador não encontrado! </p>
  @endif
  <a href="/jogos">&#9664;Voltar</a>
</body>
</html>