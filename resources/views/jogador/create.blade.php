<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jogador - create</title>
</head>

<body>
  <h1>Inserir novo jogador</h1>
  <form action="/jogador" method="POST">
    @csrf
    <table>
      <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome" /></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><input type="email" name="email" /></td>
      </tr>
      <tr>
        <td>Senha:</td>
        <td><input type="password" name="senha" /></td>
      </tr>
      <tr>
        <td>Data de nascimento:</td>
        <td><input type="date" name="dataNasc" /></td>
      </tr>
      <tr>
        <td>Bio:</td>
        <td><textarea name="bio" id="" cols="30" rows="10"></textarea></td>
      </tr>
      <tr>
        <td>Horario inicial que mais joga:</td>
        <td><input type="time" name="horarioInicio" /></td>
      </tr>
      <tr>
        <td>Horario final:</td>
        <td><input type="time" name="horarioFim" /></td>
      </tr>
      <tr align="center">
        <td colspan="2"><input type="submit" value="Criar" /></td>
      </tr>
      <tr align="center">
        <td colspan="2"><a href="/jogadores" style="display: inline">&#9664;&nbsp;Voltar</a></td>
      </tr>
    </table>
  </form>
</body>

</html>