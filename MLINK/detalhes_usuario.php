<?php
session_start();
include_once('conexao.php');

if (empty($_SESSION['id_usu'])) {
    echo "<script>location.href='login.php';</script>";
    exit;
}


$id_usu = $_GET['id_usu'];


$sql = "SELECT * FROM usuario WHERE id_usu = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Erro na consulta: " . $con->error);
}


$user_data = $result->fetch_assoc();

$sql_publi = "SELECT * FROM publicacoes WHERE publi_id_usuarios = ?";
$stmt_publi = $con->prepare($sql_publi);

if (!$stmt_publi) {
    die("Erro na preparação da consulta: " . $con->error);
}

$stmt_publi->bind_param("i", $id_usu);
$stmt_publi->execute();

$publicacoes = $stmt_publi->get_result()->fetch_all(MYSQLI_ASSOC);

if (empty($publicacoes)) {
    echo "Nenhuma publicação encontrada para este usuário.";
}



$imagem_url = 'img/' . $user_data['imagem'];




?>



<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <title>Perfil</title>
  <link href="styleperfil.css" rel="stylesheet" type="text/css" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>


<body>


  <div class="cont_menu_lateral">

    <button class="backpage"><img src="img/backpage.png" class="backpageimg"></button>

    

    <button class="cont_menu_lateral_bot"><img src="img/profileicon.png" class="cont_menu_lateral_botimg"></button>
    
    <button class="cont_menu_lateral_bot"><img src="img/searchicon.png" class="cont_menu_lateral_botimg"></button>
    
    <a href= 'home.php'><button class="cont_menu_lateral_bot"><img src="img/homeicon.png" class="cont_menu_lateral_botimg"></button></a>
    
    <a href = 'criapubli.php'><button class="cont_menu_lateral_bot"><img src="img/posticon.png" class="cont_menu_lateral_botimg"></button></a>
    
    <button class="cont_menu_lateral_bot"><img src="img/menuicon.png" class="cont_menu_lateral_botimg"></button>
    
  </div>



<div class="cont">
<div class="infos_txt" >
  
<form action="upload.php" method="POST" enctype="multipart/form-data" id="uploadForm">
  <?php
    $imagem_dir = 'img/perfil/'; 
    $imagem_url = $imagem_dir . $user_data['imagem'];

    if (empty($user_data['imagem']) || !file_exists($imagem_dir . $user_data['imagem'])) {
      echo '<label for="imagem">
                <img src="img/default.png" alt="Imagem de perfil padrão" class="foto_perfil">
            </label>';
  } else {
      $imagem_url = $imagem_dir . $user_data['imagem'];
      echo '<label for="imagem">
                <img class="foto_perfil" src="' . htmlspecialchars($imagem_url) . '" alt="Foto de perfil">
            </label>';
  }
  ?>


</form>



  

  <?php if (isset($user_data)): ?>
        
        <p class="infos_txt_esp">Nome: <?= htmlspecialchars($user_data['nome']); ?></p>
        <p class="infos_txt_esp">Email: <?= htmlspecialchars($user_data['email']); ?></p> 
        <p class="infos_txt_esp">Telefone: <?= htmlspecialchars($user_data['telefone']); ?></p>
        <p class="infos_txt_esp">Sobre mim: <?= htmlspecialchars($user_data['mais']); ?></p>

        <div class="space_between_edit_button"></div>

        

    <?php else:?>
       <p>Usuário não encontrado.</p>
    <?php endif;?>


  </div>

  </div>

  <div class="publicacoes">
<?php foreach ($publicacoes as $publicacao):
  ?>

    <div class="cont_feed_publi">
      <div class="cont_feed_publi_dados">
        <p class= "usu_info"><?php echo htmlspecialchars($user_data['nome'])?></p>



      </div>

      <div class="cont_feed_publi_text">
    <?php if (!empty($publicacao['legenda'])): ?>
        <p class="publi_text"><?= htmlspecialchars($publicacao['legenda']); ?></p>
    <?php else: ?>
        <p class="publi_text">Sem legenda disponível.</p>   
    <?php endif?>
    </div>
    </div>

    <?php endforeach;?>
  </div>





</body>

</html>
