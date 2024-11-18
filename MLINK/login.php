<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Login</title>
  <link href="stylelogin.css" rel="stylesheet" type="text/css" />
  <link href="reset.css" rel="stylesheet" type="text/css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

</head>

<body>

  <div class="formalign">
    <form class="formulario" action= "login_back.php" method= "POST">

      <h1 class="tit">LOGIN</h1>

      <div class="form-group">
        <label class="formulario_lab" for="nome">Nome</label>
        <input type="text" id="nome" name="nome" class="formulario_inp">
      </div>

      <div class="form-group">
        <label class="formulario_lab" for="senha">Senha</label>
        <input type="password" id="senha" name="senha" class="formulario_inp">
      </div>

      <input type="submit" value="ENTRAR" class="cadastrar">

    </form>
  </div>

  <script src="script.js"></script>
</body>

</html>
