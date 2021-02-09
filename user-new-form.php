<h1>Novo Usuário</h1>
<form action="user-new.php" method="post">
    <table class="new-user">
        <tr><td> Usuário: <td><input class="caixa-texto" type="text" name="usuario" id="usuario" size="10" maxlength="10" width="30">
        <tr><td> Nome: <td><input class="caixa-texto" type="text" name="nome" id="nome" size="10" maxlength="10">
        <tr><td> Senha: <td><input class="caixa-texto" type="password" name="senha1" id="senha1" size="10" maxlength="10">
        <tr><td> Repita a Senha: <td><input class="caixa-texto" type="password" name="senha2" id="senha2" size="10" maxlength="10">
        <tr><td> Tipo: <td><select name="tipo" id="tipo" >
                <option value="admin">Administrador do Sistema</option>
                <option value="editor" selected>Editor Autorizado</option>
                </select>

    </table>
    <input type="submit" value="Criar">

</form>
