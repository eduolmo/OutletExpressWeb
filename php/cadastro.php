<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <!-- cabecalho -->
    <?php
        include 'cabecalho2.php';
    ?>	
    
   <!-- Iniciando o formulário de login -->
   <form>
    <h1 id="titulo">Cadastro</h1>
    <!-- usuário -->
    <div class="usuario">
        <img id="perfil" src="../icones/perfil.png" for="email_usuario">
    <input type="text" id="usuario" name="usuario" placeholder="Nome de Usuário">
    </div>

    <!-- Cpf ou CNPJ -->
    <div class="cpf_cnpj">
        <img id="senha" src="../icones/cpf.png" for="Senha">
    <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="CPF ou CNPJ">
    </div>

    <!-- Senha -->
    <div class="cadeado">
    <img id="senha" type="icons" src="../icones/cadeado.png" for="Senha">
    <input type="password" id="Senha" name="Senha" placeholder="Senha">
    </div>

    <!-- Senha -->
    <div class="cadeado2">
    <img id="senha" src="../icones/cadeado.png" for="Senha">
    <input type="password" id="confirma_Senha" name="confirma_Senha" placeholder="Confirmar Senha">
    </div>

    <!-- Email -->
    <div class="Email">
        <img id="email_icons" src="../icones/o-email.png" for="Senha">
    <input type="email" id="email" name="email" placeholder="Email">
    </div>

    <!-- Aceitar os termos -->
    <div class="termos">
    <label for="termos_aceitos">Aceito todos os termos</label>
    <input type="checkbox" id="termos_aceitos" name="termos_aceitos">
    </div>

    <!-- Botão de enviar -->
    <input id="submit" type="submit" value="CADASTRAR">

    <!-- Link para caso a pessoa ainda não tenha conta -->
    <a id="conta" href="login.php">Já tem conta?</a>
    

</form>
       
</body>
</html>
