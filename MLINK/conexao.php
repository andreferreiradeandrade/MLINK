<?php
$dbhost = 'localhost';
$user = 'root';
$senha = '';
$db = 'mlink';

$con = new mysqli($dbhost, $user, $senha, $db);

//if ($con->connect_error) {
    //die("Erro de conexão: " . $con->connect_error);
//} else {
   // echo "Conexão OKAY";
//}
?>