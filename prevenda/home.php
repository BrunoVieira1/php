<?php

$connect = mysql_connect('localhost','root','');
$db      = mysql_select_db('revenda');
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
        $query = mysql_query("SELECT codigo, nome FROM marca");
        while($marcas = mysql_fetch_array($query))
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
        $query = mysql_query("SELECT codigo, nome FROM modelo");
        while($modelos = mysql_fetch_array($query))
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
$getmarcas = mysql_query($sql_marcas);


$sql_modelos  = "SELECT * FROM modelo ";
$getmodelos = mysql_query($sql_modelos);



$marca   = (empty($_POST['marca']))? 'null' : $_POST['marca'];
$modelo  = (empty($_POST['modelo']))? 'null' : $_POST['modelo'];


if (($marca <> 'null') and ($modelo == 'null'))
{
    $sql_veiculos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and marca.codigo = $marca ";
    $veiculos = mysql_query($sql_veiculos);
}

else if (($marca == 'null') and ($modelo <> 'null'))
{
    $sql_veiculos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and modelo.codigo = $modelo ";
    $veiculos = mysql_query($sql_veiculos);
}

else if (($marca == 'null') and ($modelo == 'null')) {
    $sql_veiculos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo";
    $veiculos = mysql_query($sql_veiculos);
}
else if (($marca <> 'null') and ($modelo <> 'null')) {
    $sql_veiculos       = "SELECT descricao, ano, cor, valor
                            FROM veiculo,marca,modelo
                            WHERE veiculo.codmodelo = modelo.codigo
                            and modelo.codmarca = marca.codigo
                            and modelo.codigo = $modelo
                            and marca.codigo = $marca ";
    $veiculos = mysql_query($sql_veiculos);
}




if(mysql_num_rows($veiculos) == 0)
{
   echo '<h3>Desculpe, mas sua busca nao retornou resultados ... </h3>';
}
else
{
   echo "<div class='desgraca'><h3>Resultado da pesquisa de Veiculos: </h3>";
   echo "<ul>";
			while($resultado = mysql_fetch_array($veiculos)){
			echo "<tr><td>".utf8_encode($resultado['descricao'])."</td>
			          <td>".utf8_encode($resultado['ano'])."</td>
			          <td>".utf8_encode($resultado['cor'])."</td>
			          <td>".utf8_encode($resultado['valor'])."</td></tr><br><br>";
			}
    echo "</ul></div></div>";
}
}
?>
</body>
</html>