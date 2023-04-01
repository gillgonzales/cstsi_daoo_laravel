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
  @if ($jogadores->count()>0)
  <table>
    <thead>
      <tr>
        <th>Id</th>
        <th>Admin</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Senha</th>
        <th>DataNasc</th>
        <th>Bio</th>
        <th>urlFoto</th>
        <th>HorarioInicio</th>
        <th>HorarioFim</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jogadores as $jogador)
      <tr>
        <td>
          <a href="/jogador/{{$jogador->id}}">
            {{$jogador->id}}
          </a>
        </td>
        <td>{{$jogador->admin}}</td>
        <td>{{$jogador->nome}}</td>
        <td>{{$jogador->email}}</td>
        <td>{{$jogador->senha}}</td>
        <td>{{$jogador->dataNasc}}</td>
        <td>{{$jogador->bio}}</td>
        <td>{{$jogador->urlFoto}}</td>
        <td>{{$jogador->horarioInicio}}</td>
        <td>{{$jogador->horarioFim}}</td>
        <td>
          <a href="{{ route('jogador.delete',$jogador->id) }}">
            <button>Deletar</button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  @else
  <p>jogadores não encontrados! </p>
  @endif
  <div>
    <a href="/jogador">
      <button>Criar</button>
    </a>
  </div>
</body>

</html>