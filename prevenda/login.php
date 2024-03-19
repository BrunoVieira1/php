<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<?php
    $connect = mysqli_connect('localhost', 'root', '');
    $banco = mysqli_select_db($connect, "revenda");
    if (isset($_POST['conectar'])) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $sql = mysqli_query($connect, "select * from usuario where login='$login' and senha='$senha'");
        $resultado = mysqli_num_rows($sql);
        if ($resultado == 0) {
            echo "login ou senha invalido";
        } else {
            session_start();
            $_SESSION['login'] = $login;
            header("Location:menu.html");
        }
    }
?>
<body>
    <h1>Login do Usuário</h1>
    <form action="login.php" method="post">
        <p>Login: </p>
        <input type="text" name="login" id="login" size=20 required><br>
        <p>Senha: </p>
        <input type="password" name="senha" id="senha" size=20 required><br>
        <input type="submit" value="Conectar" id="conectar" name="conectar">
    </form>
</body>
</html>