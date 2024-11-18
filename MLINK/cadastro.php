<!DOCTYPE html>
<html lang="pt-br">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Cadastro</title>
  <link href="stylecadastro.css" rel="stylesheet" type="text/css" />
  <link href="reset.css" rel="stylesheet" type="text/css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  
</head>

<body>

  <h1 class="tit">FAÇA SEU CADASTRO</h1>




  <div class="formalign">
  <form class="formulario" action= "cadastro_back.php" method="POST">



    
    <label class="formulario_lab">Nome de usuário</label>
    <input type="text" id="nome" name="nome" class="formulario_inp">


    
    <label class="formulario_lab">Email</label>
    <input type="email" id="email" name="email" class="formulario_inp">



    
    <label class="formulario_lab">Telefone</label>
    <input type="tel" id="tel" name="tel" class="formulario_inp">



    
    <div class="catrad">

    
      <label class="formulario_lab">No que você se enquadra?</label>

      <div class="cat_space">
      <label class="formulario_lab_cat_op">Produtor</label>
      <input class="formulario_inp_cat" type="radio" name="cat" value="1">
      <label class="formulario_lab_cat_op">Artista</label>
      <input class="formulario_inp_cat" type="radio" name="cat" value="0">
      </div>
      
    </div>



    
    <label class="formulario_lab">Senha</label>
    <input type="password" id="senha" name="senha" class="formulario_inp">
    <label class="formulario_lab">Confirme sua senha</label>
    <input type="password" id="confsenha" name="confsenha" class="formulario_inp">



    
    <input type="submit" name= "submit" value="CADASTRAR" class="cadastrar">


  </form>
    </div>

  <script src="script.js"></script>
</body>

</html>