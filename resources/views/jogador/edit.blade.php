<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar jogador</title>
</head>

<body>
  <h1>Editar jogador</h1>
  <form action="{{route('jogador.update',$jogador->id)}}" method="POST">
    @csrf
    <table>
      <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome" value="{{$jogador->nome}}" /></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" name="email" value="{{$jogador->email}}" /></td>
      </tr>
      <tr>
        <td>Senha:</td>
        <td><input type="password" name="senha" value="{{$jogador->senha}}" /></td>
      </tr>
      <tr>
        <td>Data de nascimento:</td>
        <td><input type="date" name="dataNasc"  value="{{$jogador->dataNasc}}" /></td>
      </tr>
      <tr>
        <td>Bio:</td>
        <td><textarea name="bio" id="" cols="30" rows="10">{{$jogador->bio}}</textarea></td>
      </tr>
      <tr>
        <td>Horario inicial que mais joga:</td>
        <td><input type="time" name="horarioInicio" value="{{$jogador->horarioInicio}}" /></td>
      </tr>
      <tr>
        <td>Horario final:</td>
        <td><input type="time" name="horarioFim" value="{{$jogador->horarioFim}}" /></td>
      </tr>
      <tr align="center">
        <td colspan="2">
          <input type="submit" value="Salvar" />
          <a href="/jogadores">
            <button form=cancel>Cancelar</button>
          </a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>