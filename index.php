<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Listagem de Jogos</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="estilo/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


</head>
<body>
<?php
    require_once "includes/banco.php";
    require_once "includes/login.php";
    require_once "includes/funcoes.php";
    $ordem = $_GET['o'] ?? "n";
    $chave = $_GET['c'] ?? "";
?>

<div id="corpo">
    <?php include_once "includes/topo.php"?>
    <h1>Listagem de Jogos</h1>

    <form method="get" id="busca" action="index.php">
        Ordenar:
        <a href="index.php?o=n&c=<?php echo $chave; ?>">Nome</a> |
        <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> |
        <a href="index.php?o=n1&c=<?php echo $chave; ?>">Nota Alta</a> |
        <a href="index.php?o=n2&c=<?php echo $chave;?>">Nota Baixa</a> |
        <a href="index.php">Mostrar Todos</a> |
        Buscar: <input type="text" name="c" size="10" maxlength="40">
        <input type="submit" value="Ok">

    </form>
    <table class="listagem">
    <?php
    $q = 'select j.cod, j.nome, g.genero,
    p.produtora, j.capa from jogos j 
    join generos g on j.genero = g.cod 
    join produtoras p on j.produtora = p.cod ';

    if( !empty($chave)){

        $q .= "WHERE j.nome like '%$chave%' OR g.genero like '%$chave%' OR p.produtora like '%$chave%' ";
    }
    switch ($ordem){
        case "p":
            $q .= "ORDER BY p.produtora ";
            break;
        case "n1":
            $q .= "ORDER BY j.nota DESC ";
            break;
        case "n2":
            $q .= "ORDER BY j.nota ASC ";
            break;
        default:
            $q .= "ORDER BY j.nome ";
            break;

    }
    #echo "<p>$q</p>";
    $busca = $banco->query($q);
    if(!$busca){
        echo "<tr><td>Infelizmente a busca deu errado";
    }else{
        if($busca->num_rows == 0){
            echo"<tr><td>Nenhum registro encontrado";
        }else{
            while($reg=$busca->fetch_object()){
                $t = thumb($reg->capa);
                echo"<tr><td><img src='$t' class='mini'/>";
                echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                echo " [$reg->genero]";
                echo "<br>$reg->produtora";
                if (is_admin()){
                    echo "<td>";
                    echo "<i class='material-icons'> add_circle</i> ";
                    echo "<i class='material-icons'> edit</i> ";
                    echo "<i class='material-icons'> delete</i> ";
                } elseif (is_editor()){
                    echo "<td>";
                    echo "<i class='material-icons'> edit</i> ";
                }
            }
    }
    }
    ?>

    </table>
</div>
<?php
include_once "includes/footer.php"
?>
</body>
</html>
