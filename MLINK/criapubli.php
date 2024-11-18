<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicando</title>
    <link href= "stylecriapubli.css" rel= "stylesheet" type= "text/css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">

</head>

<body>

<div class="cont_menu_lateral">

     

        <a href= "perfil12.php"><button class="cont_menu_lateral_bot"><img src="img/profileicon.png" class="cont_menu_lateral_botimg"></button></a>

      <button class="cont_menu_lateral_bot"><img src="img/searchicon.png" class="cont_menu_lateral_botimg"></button>

      <a href= 'home.php'><button class="cont_menu_lateral_bot"><img src="img/homeicon.png" class="cont_menu_lateral_botimg"></button></a>

      <a href= "criapubli.php"><button class="cont_menu_lateral_bot"><img src="img/posticon.png" class="cont_menu_lateral_botimg"></button></a>

      <a href= "perfil.php"><button class="cont_menu_lateral_bot"><img src="img/menuicon.png" class="cont_menu_lateral_botimg"></button></a>

    </div>

    <p class= "yourpubli">Sua publicação vai aparecer assim: </p>
    <div class = "cont">

        <form action="criapubli_back.php" method="POST" class= "formulario">

            <div class="cont_feed_publi">
                <div class="cont_feed_publi_dados">
              
                </div>
    
                <div class="cont_feed_publi_text">
                    <input type="text" id="legenda" name="legenda" placeholder="Digite aqui o que precisa" class= "input_legenda">
                </div>

                <input type="submit" value="PUBLICAR" name= "submit" id= "submit" class= "publicar">
          </div>

    </form>
    
    </div>

</body>

</html>