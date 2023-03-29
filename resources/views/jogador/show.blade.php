<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Jogadores</title>
</head>

<body>
  <h1>Jogadores</h1>
  @if (isset($jogador))
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Admin</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>DataNasc</th>
        <th>Descricao</th>
        <th>urlFoto</th>
        <th>HorarioInicio</th>
        <th>HorarioFim</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$jogador->id}}</td>
        <td>{{$jogador->admin}}</td>
        <td>{{$jogador->nome}}</td>
        <td>{{$jogador->email}}</td>
        <td>{{$jogador->senha}}</td>
        <td>{{$jogador->dataNasc}}</td>
        <td>{{$jogador->descricao}}</td>
        <td>{{$jogador->urlFoto}}</td>
        <td>{{$jogador->horarioInicio}}</td>
        <td>{{$jogador->horarioFim}}</td>
      </tr>
    </tbody>
  </table>
  @else
  <p>jogo não encontrado! </p>
  @endif
  <a href="/jogador/">
    Voltar
  </a>
</body>

</html>