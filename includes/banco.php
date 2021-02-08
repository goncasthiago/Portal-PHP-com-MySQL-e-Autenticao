<?php
    $banco = new mysqli("127.0.0.1", "root", "", "bd_games");
    if($banco->connect_errno){
        echo "Encontrei um erro $banco->errno --> $banco->connect_error";
        die();
    }
    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");