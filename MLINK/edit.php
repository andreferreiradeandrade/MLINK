<?php
include_once('conexao.php');

$nome = '';
$email = '';
$telefone = '';
$senha = '';
$sobre = '';
$id = '';

if (!empty($_GET['id_usu'])) {
    $id = intval($_GET['id_usu']); // Converte o ID para inteiro

    $sqlconsulta = "SELECT * FROM usuario WHERE id_usu = $id";
    $result = $con->query($sqlconsulta);

    if ($result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $nome = $user_data['nome'];
        $email = $user_data['email'];
        $telefone = $user_data['telefone'];
        $senha = $user_data['senha'];
        $mais = $user_data['mais'];
        $id = $user_data['id_usu'];
    } else {
        header('Location: perfil.php');
        exit; 
    }
} else {
    header('Location: perfil.php');
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link href="styleedit.css" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">


</head>
<body>
    <div class="box">
        <form action="atualiza.php" method="POST">
            <div class= "fieldset">
                <legend><b>ALTERE SEUS DADOS</b></legend>
                <br>
                <div class= "inputBox_todo">
                <div class="inputBox">
                    <label for="nome" class="labelInputNome">Nome</label>
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo htmlspecialchars($nome); ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="email" class="labelInputEmail">Email</label>
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo htmlspecialchars($email); ?>" >
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="telefone" class="labelInputTelefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="inputUser" value="<?php echo htmlspecialchars($telefone); ?>" >
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="sobre" class="labelInputSobre">Sobre mim</label>
                    <input type="text" name="sobre" id="sobre" class="inputUser" value="<?php echo htmlspecialchars($sobre); ?>" >
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="senha" class="labelInputSenha">Senha</label>
                    <input type="text" name="senha" id="senha" class="inputUser" value="<?php echo htmlspecialchars($senha); ?>" required>
                </div>
</div>

                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                <input class= "atualizar_button" type="submit" name="update" id="update" value="ATUALIZAR">

                
            </div>
        </form>
    </div>
</body>
</html>
