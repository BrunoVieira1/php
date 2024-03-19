<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '');

$banco = mysqli_select_db($connect, 'revenda');

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert marca (codigo, nome) values ('$codigo','$nome')";

    $resultado = mysqli_query($connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados gravados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['excluir'])) {
    
}

if (isset($_POST['alterar'])) {
    
}

if (isset($_POST['pesquisar'])) {
    
}
?>