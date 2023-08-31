<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<body>
   <!-- cabecalho -->
   <?php
        include 'cabecalho2.php';
    ?>	
    
    <section>
        <form>
            <h1 id="titulo">Login</h1>
            <!-- Email ou nome de usuário -->
            <div class="usuario">
            <img id="perfil" src="../icones/perfil.png" for="email_usuario">
            <input type="text" id="email_usuario" name="email_usuario" placeholder="Email ou Usuário">
            </div>

            <!-- Senha -->
            <div class="cadeado">
            <img id="senha" src="../icones/cadeado.png" for="Senha">
            <input type="password" id="Senha" name="Senha" placeholder="Senha">
            </div>

            <!-- Botão de enviar -->
            <input id="submit" type="submit" value="ENTRAR">

            <!-- Link para caso a pessoa ainda não tenha conta -->
            <a id="conta" href="cadastro.php">Não tem conta? Cadastre-se</a>
        </form>
    </section> 
</body>
</html>
