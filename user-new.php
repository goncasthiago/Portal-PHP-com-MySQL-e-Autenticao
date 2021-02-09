<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Novo Usuário</title>
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
    <?php
        if(!is_admin()){
            echo msg_erro("Área restrita! Você não é um Administrador!");
        }else{
            if(!isset($_POST['usuario'])){
                require "user-new-form.php";
            }else{
                $usuario = $_POST['usuario'] ?? null;
                $nome = $_POST['nome'] ?? null;
                $senha1 = $_POST['senha1'] ?? null;
                $senha2 = $_POST['senha2'] ?? null;
                $tipo = $_POST['tipo'] ?? null;

                if($senha1===$senha2){

                    if( empty($nome) || empty($usuario) || empty($senha1) || empty($senha2) || empty($tipo)){
                        echo msg_erro("Todos os dados são obrigatórios!");
                    }else{
                        $senha = gerarHash($senha1);
                        $q = "insert into usuarios (usuario, nome, senha, tipo) values ('$usuario','$nome', '$senha', '$tipo' )";
                        $user_new = $banco->query($q);
                        if($user_new == 1){
                            echo msg_sucesso("Usuário $nome adicionado com Sucesso!");
                        }else{
                            echo msg_erro("Erro ao adicionar usuário $nome, Tente novamente!");
                        }
                    }
                }else{
                    echo msg_erro(" Senhas não conferem");
                }
            }

        }
        echo "<br>";
        echo voltar();
    ?>
</div>
</body>
</html>