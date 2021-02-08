<pre><?php
    $banco = new mysqli("127.0.0.1", "root", "", "bd_games");
    if($banco->connect_errno){
        echo "Encontrei um erro $banco->errno --> $banco->connect_error";
        die();
    }
    $banco->query("SET NAMES 'utf8'");
    $banco->query("SET character_set_connection=utf8");
    $banco->query("SET character_set_client=utf8");
    $banco->query("SET character_set_results=utf8");

    $busca = $banco->query("SELECT j.cod, j.nome, g.genero, p.produtora, j.descricao, j.nota, j.capa FROM jogos j
JOIN generos g ON j.genero = g.cod
JOIN produtoras p ON j.produtora =p.cod");

    if(!$busca){
        echo "Falha na busca! $banco->error";
    }else{
        while($reg = $busca->fetch_object()) {

            print_r($reg);
        }
    }
