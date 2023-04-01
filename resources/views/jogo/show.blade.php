<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Jogos</title>
</head>

<body>
  <h1>Jogos</h1>
  @if (isset($jogo))
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>urlFoto</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$jogo->id}}</td>
        <td>{{$jogo->nome}}</td>
        <td>{{$jogo->urlFoto}}</td>
      </tr>
    </tbody>
  </table>
  @else
  <p>jogo não encontrado! </p>
  @endif
  <a href="/jogos/">
    Voltar
  </a>
</body>

</html>