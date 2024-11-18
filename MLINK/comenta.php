<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
session_start();

include_once('conexao.php');

    
    

    ?>

</head>

<body>
    
    <p><?php echo $publicacao['legenda'] ?></p>

</body>

</html>