<link rel="stylesheet" href="../cad.css">
<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '');

$banco = mysqli_select_db($connect, 'revenda');

if (isset($_POST['gravar'])) {
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];
    $foto1 = $_FILES['foto1'];
    $foto2 = $_FILES['foto2'];

    $diretorio = "../img/";

    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));

    $novo_nome1 = md5(time()).$extensao1;

    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1);

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));

    $novo_nome2 = md5(time()).$extensao2;

    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2);

    $sql = "insert veiculo (codigo, descricao, codmodelo, ano, cor, placa, opcionais, valor, foto1, foto2) values ('$codigo', '$descricao', '$codmodelo', '$ano', '$cor', '$placa', '$opcionais', '$valor', '$novo_nome1', '$novo_nome2')";

    $resultado = mysqli_query($connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados gravados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['excluir'])) {
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];


    $sql = "delete from veiculo where codigo = '$codigo'";

    $resultado = mysqli_query($connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados excluidos.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['alterar'])) {
    $codigo = $_POST['codigo'];
    $descricao = $_POST['descricao'];
    $codmodelo = $_POST['codmodelo'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $opcionais = $_POST['opcionais'];
    $valor = $_POST['valor'];

    $sql = "update veiculo set descricao = '$descricao', ano = '$ano', cor = '$cor', placa = '$placa', opcionais = '$opcionais', valor = '$valor' where codigo = '$codigo'";
    
    $resultado = mysqli_query($connect, $sql);

    if ($resultado === TRUE) {
        echo "Dados alterados.";
    } else {
        echo "Deu merda dog.";
    }
}

if (isset($_POST['pesquisar'])) {
    $sql = mysqli_query($connect, "select * from veiculo");
    echo '<div class="php"><h2>veiculos Cadastradas</h2>';
    while ($dados = mysqli_fetch_object($sql)) {
        echo "<h3>Codigo: ".$dados->codigo.", ";
        echo "Descricao: ".$dados->descricao.", ";
        echo "CodModelo: ".$dados->codmodelo.", ";
        echo "Ano: ".$dados->ano.", ";
        echo "Cor: ".$dados->cor.", ";
        echo "Placa: ".$dados->placa.", ";
        echo "Opcionais: ".$dados->opcionais.", ";
        echo "Valor: ".$dados->valor."</h3> ";
        echo '<img src= "../img/'.$dados->foto1.'" height="120" width="200" />'."";
        echo '<img src= "../img/'.$dados->foto2.'" height="120" width="200" />'."</div>";
    }
}
?>