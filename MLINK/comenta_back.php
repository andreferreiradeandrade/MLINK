<?php
session_start();
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    if (!isset($_SESSION['id_usu'])) {
        die('Você precisa estar logado para comentar');
    }

    $id_publi = $_POST['id_publi'];
    $conteudo = $_POST['conteudo'];
    $id_usuario = $_SESSION['id_usu']; // Certifique-se de que o ID do usuário está na sessão

    if (!empty($conteudo)) {
        $sql = "INSERT INTO comentario (usuario_id, conteudo, publicacao_id) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("isi", $id_usuario, $conteudo, $id_publi);

        if ($stmt->execute()) {
            header("Location: home.php");
            exit;
        } else {
            echo "Erro ao publicar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "O comentário não pode estar vazio.";
    }
}
?>
