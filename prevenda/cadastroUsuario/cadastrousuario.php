<?php

$conectar = mysql_connect('localhost', 'root', '');
$banco = mysql_select_db("revenda");

if (isset($_POST['cadastrar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "insert usuario (codigo, nome, login, senha) values ('$codigo', '$nome', '$login', '$senha')";
    $resultado = mysql_query($sql);
    if ($resultado === TRUE) {
        echo "Dados gravados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "delete from usuario where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado === TRUE) {
        echo "Dados excluidos.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $sql = "update usuario set nome = '$nome', login = '$login' where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado === TRUE) {
        echo "Dados alterados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = mysql_query("select * from usuario");
    echo '<div class="php"><h2>usuario Cadastradas</h2>';
    while ($dados = mysql_fetch_object($sql)) {
        echo "<h3>Codigo: ".$dados->codigo.", ";
        echo "Nome: ".$dados->nome.", ";
        echo "Login: ".$dados->login."</h3></div>";
    }
}
?>