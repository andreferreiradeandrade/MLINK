<?php
session_start();

if (empty($_POST['nome']) || empty($_POST['senha'])) {
    echo "<script>location.href='index.php';</script>";
    exit;
}

include("conexao.php");

#real_scape_string serve para evitar SQL Injection
$nome = $con->real_escape_string($_POST['nome']);
$senha = $con->real_escape_string($_POST['senha']);


$sql = "SELECT * FROM usuario WHERE nome = ? AND senha = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $nome, $senha);
$stmt->execute();

if(!$stmt) {
    die("Erro ao preparar a consulta: ". $con->error);
}

if (!$stmt->bind_param("ss", $nome, $senha)){
    die("Erro no bind_param: " . $stmt->error);
}

if(!$stmt->execute()){
    die("Erro ao executar a consulta ". $stmt->error);
}

$res = $stmt->get_result();

#Verifica se $res->num_rows > 0, ou seja, se foram encontrados registros na tabela usuario que correspondem ao nome de usuário e senha fornecidos.
#Se a consulta retornar pelo menos uma linha, significa que o login foi bem-sucedido.
#Define $_SESSION["usuario"] como $usu, armazenando o nome de usuário na variável de sessão.
if ($res->num_rows > 0) {
    $usuario = $res->fetch_assoc();
    $_SESSION["id_usu"] = $usuario['id_usu'];
    echo "<script>location.href='home.php';</script>";
    exit;
} else {
    echo "<script>alert('Usuário ou senha inválido');</script>";
    echo "<script>location.href='index.php';</script>";
    exit;
}
?>