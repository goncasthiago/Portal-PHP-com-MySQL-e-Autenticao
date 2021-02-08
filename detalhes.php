<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Detalhes do Jogo</title>
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
?>
<div id="corpo">
    <?php include_once "includes/topo.php";
    $c = $_GET['cod'] ?? 0;
    $busca = $banco->query("select * from jogos where cod='$c'");
    $reg = $busca->fetch_object();
    ?>
    <h1>Detalhes do Jogo</h1>
    <table class="detalhes">
        <?php
        if(!$busca){
            echo "<tr><td>Infelizmente a busca deu errado!";
        }else{
            if($busca->num_rows==0){
                echo"<tr><td>Nenhum registro encontrado";
            }else{
                $t = thumb($reg->capa);
                echo "<tr><td rowspan='3'> <img alt='Capa do jogo $reg->nome' src='$t' class='full'/>";
                echo "<td> <h2>$reg->nome</h2>";
                echo "Nota: " . number_format($reg->nota,1) . "/10.0";
                if (is_admin()){

                    echo "   <i class='material-icons'> add_circle</i> ";
                    echo "<i class='material-icons'> edit</i> ";
                    echo "<i class='material-icons'> delete</i> ";
                } elseif (is_editor()){

                    echo "   <i class='material-icons'> edit</i> ";
                }
                echo "<tr><td> $reg->descricao";


            }
        }
        ?>
    </table>
    <?php echo voltar();?>
</div>
<?php
include_once "includes/footer.php"
?>
</body>
</html>