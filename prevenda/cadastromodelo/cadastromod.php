<link rel="stylesheet" href="../cad.css">
<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '');

$banco = mysqli_select_db($connect, 'revenda');

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $codmarca = $_POST['codmarca'];

    $sql = "insert modelo (codigo, nome, codmarca) values ('$codigo', '$nome', '$codmarca')";

    $resultado = mysqli_query($connect, $sql);

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

    $resultado = mysqli_query($connect, $sql);

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

    $resultado = mysqli_query($connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados alterados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = mysqli_query($connect, "select * from modelo");
    echo '<div class="php"><h2>modelo Cadastradas</h2>';
    while ($dados = mysqli_fetch_object($sql)) {
        echo "<h3>Codigo: ".$dados->codigo.", ";
        echo "Nome: ".$dados->nome.", ";
        echo "CodMarca: ".$dados->codmarca."</h3></div>";
    }
}
?>