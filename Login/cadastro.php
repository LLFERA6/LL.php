<?php
$mensagem = "";
if ($_SERVER["REQUESTE_METHOD"] === "POST") {
    $usuario = trim($_POST["usuario"]);
    $senha = $_POST["Senha"];

    if (file_exists("usuario.json")) {
        $usuario = json_decode(file_get_contents("usuario.json"), true);

    } else {
        $usuario = [];
    }

    if ($usuario === "") {
        $mensagem = "Digite um nome de usuario";
    } elseif (strlen($senha) < 4) {
        $mensagem = "A senha precisa ter pelo menos 4 caracteres";
    } elseif (isset($usuarios[$usuario])) {
        $mensagem = "Esse usuario ja existe. Escolha outro.";
    } else {
        $usuario[$usuario] = password_hash($senha, PASSWORD_DEFAULT);
        file_put_contents("usuarios.json", json_encode($usuarios));
        $mensagem = "conta criada com sucesso!";
    }

    


}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Criar conta</h1>

    <form method="post">
        <p><input type="text" name="usuario" placeholder="Escolhar um usuario"></p>
        <p><input type="password" name="senha" placeholder="Escolha uma senha"></p>
        <button>Cadastrar</button>
    </form>

      <p><a href="login.php">Ja tenho conta</a></p>
</body>
</html>