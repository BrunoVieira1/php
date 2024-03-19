<link rel="stylesheet" href="../cad.css">
<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '');

$banco = mysqli_select_db($connect, 'revenda');

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "insert marca (codigo, nome) values ('$codigo','$nome')";

    $resultado = mysqli_query($connect, $connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados gravados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "delete from marca where codigo = '$codigo'";

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

    $sql = "update marca set nome = '$nome' where codigo = '$codigo'";

    $resultado = mysqli_query($connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados alterados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = mysqli_query($connect, "select * from marca");
    echo '<div class="php"><h2>Marcas Cadastradas</h2>';
    while ($dados = mysqli_fetch_object($sql)) {
        echo "<h3>Codigo: ".$dados->codigo.", ";
        echo "Nome: ".$dados->nome."</h3></div>";
    }
}
?>