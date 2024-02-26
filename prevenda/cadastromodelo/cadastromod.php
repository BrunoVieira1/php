<link rel="stylesheet" href="../cad.css">
<?php
session_start();

$connect = mysql_connect('localhost', 'root', '');

$banco = mysql_select_db('revenda');

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $codmarca = $_POST['codmarca'];

    $sql = "insert modelo (codigo, nome, codmarca) values ('$codigo','$nome', '$codmarca')";

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
    $codmarca = $_POST['codmarca'];

    $sql = "delete from modelo where codigo = '$codigo'";

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
    $codmarca = $_POST['codmarca'];

    $sql = "update modelo set nome = '$nome' where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado === TRUE) {
        echo "Dados alterados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = mysql_query("select * from modelo");
    echo '<div class="php"><h2>modelo Cadastradas</h2>';
    while ($dados = mysql_fetch_object($sql)) {
        echo "<h3>Codigo: ".$dados->codigo.", ";
        echo "Nome: ".$dados->nome.", ";
        echo "CodMarca: ".$dados->codmarca."</h3></div>";
    }
}
?>