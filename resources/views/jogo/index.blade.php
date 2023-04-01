<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de jogos</title>
</head>

<body>
  <h1>Jogos</h1>
  @if ($jogos->count()>0)
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>urlFoto</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jogos as $jogo)
      <tr>
        <td>
          <a href="/jogo/{{$jogo->id}}">
            {{$jogo->id}}
          </a>
        </td>
        <td>{{$jogo->nome}}</td>
        <td>{{$jogo->urlFoto}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <p>Jogos não encontrados! </p>
  @endif
  <div>
    <a href="/jogo">
      <button>Criar</button>
    </a>
  </div>
</body>

</html>