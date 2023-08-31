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
    <!-- começo do cabecalho -->
    <header class="cabecalho">
        <div class="cabecalho_pesquisa">
            <!-- div que contem a logo do site -->
            <div id="logo">
                <a href="index.php">
                    <img src="../imagens/logo1.png" alt="logo do site">
                    <h1 class="logo">OutLet Express</h1>
                </a>
            </div>
            <!-- div que tem a barra de pesquisa -->
            <div class="busca">
                <img class="lupa" src="../icones/lupa.png" alt="">
                <input type="text" class="pesquisa" placeholder="   Buscar">
            </div>
            <!-- div que tem os botoes para o carrinho e para entrar -->
            <div class="botoes">
                <button class="botao">DOWNLOAD APP</button>
                <div class="carrinho">
                    <a href="carrinho.php"><img class="carrinho_img" src="../icones/bolsa-de-compras.png" alt=""></a>
                    <a href="carrinho.php"><p>CARRINHO</p></a>
                </div>
                <div class="entrar">
                    <a href="cadastro.php"><img class="entrar_img" src="../icones/pessoas.png" alt=""></a>
                    <a href="cadastro.php"><P>ENTRAR</P></a>
                </div>
            </div>
        </div>
        <!-- fim do cabecalho roxo --> 
        <!-- inicio da cabecalho rosa -->
        <nav class="cabecalho_menu">
            <li><a href="produtos.php">MAIS VENDIDOS</a></li>
            <li><a href="produtos.php">ROUPA</a></li>
            <li><a href="produtos.php">CALÇADO</a></li>
            <li><a href="produtos.php">ELETRODOMÉSTICO</a></li>
            <li><a href="produtos.php">ELETRÔNICO</a></li>
            <li><a href="produtos.php">MÓVEL</a></li>
        </nav>
    </header>
    <!-- fim do cabecalho rosa --> 
    
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
