<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Login</title>

    <meta charset="UTF-8" />
    <link rel="stylesheet" href="estilo/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>
<style>

    div#corpo{
        width: 270px;
        font-size: 15pt;
    }
    td{
        padding: 6px;
    }

    input{

        size: auto;
    }

</style>
<?php
require_once "includes/banco.php";
require_once "includes/login.php";
require_once "includes/funcoes.php";
?>
<div id="corpo">
    <?php
        $u = $_POST['usuario'] ?? null;
        $s = $_POST['senha'] ?? null;

        if (is_null($u) || is_null($s)){
            require "user-login-form.php";
        }else{
            $q= "Select usuario, nome, senha, tipo from usuarios where usuario = '$u' limit 1 ";
            $busca = $banco->query($q);
            if (!$busca){
                echo msg_erro("Falha ao acessar o banco!");

            }else{
                if($busca->num_rows>0){

                $reg = $busca->fetch_object();
                if(testarHash($s,$reg->senha)){
                    echo msg_sucesso("Usuário logado!");
                    $_SESSION['user'] = $reg->usuario;
                    $_SESSION['nome'] = $reg->nome;
                    $_SESSION['tipo'] = $reg->tipo;
                }else{
                    echo msg_erro('Nome de usuário ou senha incorretos!');
                }
                }else{
                    echo msg_erro('Usuário não existe!');

                }
            }
        }
        echo voltar();
    ?>
</div>

</body>
</html>
