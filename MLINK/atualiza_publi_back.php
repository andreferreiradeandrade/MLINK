<?php
session_start();
include_once('conexao.php');

if (isset($_POST['submit'])) {
    $id = intval($_POST['id']); // Obtém o ID do formulário
    $legenda = $_POST['legenda'];


    $sqlatualiza = "UPDATE publicacoes SET legenda='$legenda' WHERE id_publi='$id'";
    $result = $con->query($sqlatualiza);


    if ($result) {
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $con->error;
    }

    header('Location: perfil12.php');
    exit;
} else {
    header('Location: perfil12.php');
    exit;
}
?>