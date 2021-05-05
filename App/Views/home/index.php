<div>
<form action="http://localhost/controlecombustivel/usuario/cadastrar" method="post">
    <fieldset>
        <legend>Cadastro de Usuario</legend>
        <div>
            <span for="email">E-mail</span><br>
            <input type="email" name="email" id="email" value="<?= App\Lib\Sessao::retornaValorFormulario('email'); ?>">
        </div>

        <div>
            <span for="login">Login</span><br>
            <input type="text" name="login" id="login" 
            value="<?= App\Lib\Sessao::retornaValorFormulario('login');?>">
        </div>

        <div>
            <span for="senha">Senha</span><br>
            <input type="password" name="senha" id="senha"
            value="<?= App\Lib\Sessao::retornaValorFormulario('senha');?>">
        </div><br>

        <input type="submit" name="cadastrar" id="cadastrar"> 
        <span></span>
    </fieldset>
</form>
</div>