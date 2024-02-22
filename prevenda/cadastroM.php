<?php
session_start();

$connect = mysql_connect('localhost', 'root', '');

$banco = mysql_select_db('revenda');

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert marca (codigo, nome) values ('$codigo','$nome')";

    $resultado = mysql_query($sql);

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