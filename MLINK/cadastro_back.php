<?php
  
  #Se o botão enviar for pressionado
  if(isset($_POST['submit'])){
    include_once('conexao.php');

    #Conectando colunas do banco com os inputs no formulário
    $nome =$_POST['nome'];
    $email =$_POST['email'];
    $senha =$_POST['senha'];
    $categoria =$_POST['cat'];
    $telefone =$_POST['tel'];

    #Faz a inserção na base de dados
    $result = mysqli_query($con, "INSERT INTO usuario(nome, email, senha, categoria, telefone) VALUES ('$nome', '$email', '$senha', '$categoria', '$telefone')");

    if($result) {
      // Redireciona para a página de sucesso
      header("Location: home.php");
      exit(); // Importante para garantir que o script pare de executar
  } else {
      // Redireciona para a página de erro ou mostra uma mensagem
      echo 'Erro ao cadastrar: ' . mysqli_error($con);
  }
}
?>