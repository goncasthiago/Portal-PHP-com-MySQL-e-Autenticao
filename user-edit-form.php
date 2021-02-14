<h1>Alteração de Dados</h1>
<?php
	$q = "select usuario, nome, tipo, senha from usuarios where usuario = '". $_SESSION['user'] ."'";
	$busca = $banco->query($q);
	$reg = $busca->fetch_object();
?>
<form action="user-edit.php" method="post">

	<table>
		<tr><td> Usuário
		<td> <input class="caixa-texto" type="text" name="usuario" id="usuario" maxlength="10" size="10" readonly value="<?php echo $reg->usuario?>">
		<tr><td>Nome
		<td><input class="caixa-texto" type="text" size="30" maxlength="30" name="nome" id="nome" value="<?php echo $reg->nome; ?>">
		<tr><td>Tipo
		<td><input class="caixa-texto" type="text" name="tipo" id="tipo" value="<?php echo $reg->tipo;?>"readonly>
		<tr><td>Senha
		<td> <input class="caixa-texto" type="password" name="senha1" id="senha1" maxlength="10" size="10">
		<tr><td>Repita a Senha
			<td> <input class="caixa-texto" type="password" name="senha2" id="senha2" maxlength="10" size="10">
		<tr><td><input type="submit" value="Salvar">
	</table>
</form>