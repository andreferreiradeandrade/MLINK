<!DOCTYPE html>
<html lang="pt-br">



<head>

<?php
session_start();
include_once('conexao.php');

if (empty($_SESSION['id_usu'])) {
    echo "<script>location.href='login.php';</script>";
    exit;
}


$id_publi = $_GET['id_publi'];


$sql = "SELECT * FROM publicacoes WHERE id_publi = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id_publi);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Erro na consulta: " . $con->error);
}


$publi_data = $result->fetch_assoc();

$sql_coment = "SELECT * FROM comentario WHERE publicacao_id = ?";
$stmt_coment = $con->prepare($sql_coment);

if (!$stmt_coment) {
    die("Erro na preparação da consulta: " . $con->error);
}

$stmt_coment->bind_param("i", $id_publi);
$stmt_coment->execute();

$comentarios = $stmt_coment->get_result()->fetch_all(MYSQLI_ASSOC);








?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Home</title>
  <link href="stylecomenta.css?v=<?= time(); ?>" rel="stylesheet" type="text/css"/>

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>



<body>





  <div class="logo">
    <a href= "cadastro.php"><button class="backpage">

      <img src="img/backpage.png" class= "backpageimg">

    </button>
    </a>
   
    <img src="img/logo.png" class="logo_img">
  </div>





  <main class="cont">

    


    <div class="cont_menu_lateral">
      <div class="cont_menu_lateral_perfil">
      
      </div>
      <a href= "perfil12.php"><button class="cont_menu_lateral_bot"><img src="img/profileicon.png" class="cont_menu_lateral_botimg"></button></a>
      <button class="cont_menu_lateral_bot"><img src="img/searchicon.png" class="cont_menu_lateral_botimg"></button>
      <button class="cont_menu_lateral_bot"><img src="img/homeicon.png" class="cont_menu_lateral_botimg"></button>
      <a href= "criapubli.php"><button class="cont_menu_lateral_bot"><img src="img/posticon.png" class="cont_menu_lateral_botimg"></button></a>
      <a href= "perfil.php"><button class="cont_menu_lateral_bot"><img src="img/menuicon.png" class="cont_menu_lateral_botimg"></button></a>
    </div>

    <div class = "cont_feed">

    <<form class="cont_feed_barra" action="coment_back.php" method="POST">
    <input type="hidden" name="id_publi" value="<?php echo htmlspecialchars($id_publi); ?>">
    <input type="text" id="searchbar" name="conteudo" placeholder="Digite aqui seu comentário" class="cont_feed_barrain">
    <input type="submit" name="submit" id="submit" value="Coment">
    <div class="space_barr"></div>
</form>

<div class= "space_barr"></div>
    <?php if (!empty($comentarios)): ?>
    <?php foreach ($comentarios as $comentario): ?>
        <div class= "cont_feed_coment_text">
        <p class= "coment_text"><?php echo htmlspecialchars($comentario['conteudo']); ?></p>
    </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Nenhum comentário encontrado para esta publicação.</p>
<?php endif; ?>
</div>






  </main>



  <script src="script.js"></script>


</body>




</html>