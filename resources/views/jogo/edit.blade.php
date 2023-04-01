<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Editar Jogo</title>
</head>

<body>
  <h1>Editar Jogo</h1>
  <form action="{{route('jogo.update',$jogo->id)}}" method="POST">
    @csrf
    <table>
      <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome" value="{{$jogo->nome}}" /></td>
      </tr>
      <tr align="center">
        <td colspan="2">
          <input type="submit" value="Salvar" />
          <a href="/jogos">
            <button form=cancel>Cancelar</button>
          </a>
        </td>
      </tr>
    </table>
  </form>
</body>

</html>