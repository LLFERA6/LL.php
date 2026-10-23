<?php
session_start();
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $senha   = $_POST["senha"];

if (file_exists("usuario.json")) {
    $usuario = json_decode(file_get_contents("usuarios.json"), true);
} else {
    $usuarios = [];
}

if(isset($usuarios[usuario]) && password_verify($senha, $usuarios[$usuario])) {
    $_SESSION["usuario"] = $usuario;
    header("Location: painel.php");
    exit;
} else {
    $mensagem = "Usuario ou senha incorretos"
}

}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <h1>Entrar</h1>
        <p><?= $mensagem ?></p>
        <form method="post">
            <p><input type="text" name="usuario" placeholder="Usuário"></p>
            <p><input type="password" name="senha" placeholder="Senha"></p>
            <button>Entrar</button>
        </form>   
        
</body>
</html>