<?php

$connect = mysqli_connect('localhost','root','');
$db      = mysqli_select_db( $connect, 'revenda');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Pesquisa</title>
</head>
<body>
    <div class="meio">
        <a class="login" href="login.php">Login</a>
    </div>
<h1>Revenda</h1>
    <div class="demonio">
    <form name="formulario" method="post" action="home.php">
        <h2>Pesquisa por: </h2>
        <label for="">Marca: </label>
        <select name="marca">
            <option value="" selected="selected">Selecione</option>
            <?php
        $query = mysqli_query($connect, "SELECT codigo, nome FROM marca");
        while($marcas = mysqli_fetch_array($query))
        {?>
        <option value="<?php echo $marcas['codigo']?>">
                       <?php echo $marcas['nome']  ?></option>
        <?php }
        ?>
        </select><br>
        <label for="">Modelos: </label>
        <select name="modelo">
            <option value="" selected="selected">Selecione</option>
            <?php
        $query = mysqli_query($connect, "SELECT codigo, nome FROM modelo");
        while($modelos = mysqli_fetch_array($query))
        {?>
        <option value="<?php echo $modelos['codigo']?>">
                       <?php echo $modelos['nome']  ?></option>
        <?php }
        ?>
        </select><br>
        <input type="submit" name="pesquisar" value="Pesquisar">
    </form>

    <?php

if (isset($_POST['pesquisar'])) {

$sql_marcas  = "SELECT * FROM marca ";
$getmarcas = mysqli_query($connect, $sql_marcas);


$sql_modelos  = "SELECT * FROM modelo ";
$getmodelos = mysqli_query($connect, $sql_modelos);



$marca   = (empty($_POST['marca']))? 'null' : $_POST['marca'];
$modelo  = (empty($_POST['modelo']))? 'null' : $_POST['modelo'];


if (($marca <> 'null') and ($modelo == 'null'))
{
    $sql_veiculos       = "SELECT descricao, ano, cor, valor, foto1, foto2, opcionais
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and marca.codigo = $marca ";
    $veiculos = mysqli_query($connect, $sql_veiculos);
}

else if (($marca == 'null') and ($modelo <> 'null'))
{
    $sql_veiculos       = "SELECT descricao, ano, cor, valor, foto1, foto2, opcionais
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and modelo.codigo = $modelo ";
    $veiculos = mysqli_query($connect, $sql_veiculos);
}

else if (($marca == 'null') and ($modelo == 'null')) {
    $sql_veiculos       = "SELECT descricao, ano, cor, valor, foto1, foto2, opcionais
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo";
    $veiculos = mysqli_query($connect, $sql_veiculos);
}
else if (($marca <> 'null') and ($modelo <> 'null')) {
    $sql_veiculos       = "SELECT descricao, ano, cor, valor, foto1, foto2, opcionais
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and modelo.codigo = $modelo
                            and marca.codigo = $marca ";
    $veiculos = mysqli_query($connect, $sql_veiculos);
}




if(mysqli_num_rows($veiculos) == 0)
{
   echo '<h3>Desculpe, mas sua busca nao retornou resultados ... </h3>';
}
else
{
   /* echo "<div class='desgraca'><h3>Resultado da pesquisa de Veiculos: </h3>";
   echo "<table>";
   echo "<tr>";
   echo "<th>Descrição</th>";
   echo "<th>Ano</th>";
   echo "<th>Cor</th>";
   echo "<th>Valor</th>";
			while($resultado = mysqli_fetch_array($veiculos)){
			echo "<tr><td>".utf8_encode($resultado['descricao'])."</td>
			          <td>".utf8_encode($resultado['ano'])."</td>
			          <td>".utf8_encode($resultado['cor'])."</td>
			          <td>".utf8_encode($resultado['valor'])."</td></tr>";
			}
    echo "</table>"; */
        while($resultado = mysqli_fetch_array($veiculos)){
            echo '<div class="fds">
            <img src= "img/'.$resultado["foto1"].'" width="300px" height="200px" /> <div class="fds1">
            <h3>'.utf8_encode($resultado['descricao']).'</h3><div class="fds2">
            <p>'.utf8_encode($resultado['opcionais']).'</p>
            <p>'.utf8_encode($resultado['ano']).'</p>
            <p>'.utf8_encode($resultado['cor']).'</p></div>
            <h2>R$: '.utf8_encode($resultado['valor']).'</h2>
            </div>
            </div>';
        }
    echo "</div></div>";

}
}
?>
</body>
</html>