<?php
session_start();
include_once('conexao.php');

if (isset($_POST['update'])) {
    $id = intval($_POST['id']); // Obtém o ID do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $sobre = $_POST['sobre'];

    $sqlatualiza = "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', senha='$senha', mais='$sobre' WHERE id_usu='$id'";

    if (!empty($telefone)){
        $id = intval($_POST['id']); // Obtém o ID do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $sobre = $_POST['sobre'];

    $sqlatualiza = "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', senha='$senha', mais='$sobre' WHERE id_usu='$id'";
    $result = $con->query($sqlatualiza);
    }

    $result = $con->query($sqlatualiza);


    if ($result) {
        $_SESSION['usuario'] = $nome;
        $_SESSION['id_usu'] = $id;
        echo "Dados atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar dados: " . $con->error;
    }

    // Redireciona de volta para a página de perfil
    header('Location: perfil12.php');
    exit;
} else {
    header('Location: perfil12.php');
    exit;
}
?>

