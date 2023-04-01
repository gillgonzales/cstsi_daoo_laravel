<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Jogo - create</title>
</head>

<body>
  <h1>Inserir novo jogo</h1>
  <form action="/jogo" method="POST">
    @csrf
    <table>
      <tr>
        <td>Nome:</td>
        <td><input type="text" name="nome" /></td>
      </tr>
      <tr align="center">
        <td colspan="2"><input type="submit" value="Criar" /></td>
      </tr>
      <tr align="center">
        <td colspan="2"><a href="/jogos" style="display: inline">&#9664;&nbsp;Voltar</a></td>
      </tr>
    </table>
  </form>
</body>

</html>