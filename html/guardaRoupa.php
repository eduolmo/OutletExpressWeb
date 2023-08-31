<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guarda Roupa</title>
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/comprar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <!-- começo do cabecalho -->
    <header class="cabecalho">
        <div class="cabecalho_pesquisa">
            <div class="row">
                <!-- div que contem a logo do site -->
                <div class="col-5 col-md-2 col-xxl-3 me-xxl-2 logo">
                    <a href="index.php">
                        <img src="../imagens/logo1.png" alt="logo do site">
                        <h1 class="logo_titulo">OutLet Express</h1>
                    </a>
                </div>
                <!-- div que tem a barra de pesquisa -->
                <div class="col-7 col-md-8 ms-md-5 col-lg-5 pt-lg-3 col-xxl-5 ms-xxl-0  busca">
                    <!--<img class="lupa" src="../icones/lupa.png" alt="">-->
                    <input type="text" class="pesquisa" placeholder="   Buscar">
                </div>
                <!-- div que tem os botoes para o carrinho e para entrar -->
                <div class="col-12 col-md-4 pt-md-5 pt-lg-3 col-xxl-3 botoes">
                    <button class="botao">DOWNLOAD APP</button>
                    <div class="carrinho">
                        <a href="carrinho.php"><img class="carrinho_img" src="../icones/bolsa-de-compras.png" alt=""></a>
                        <a href="carrinho.php"><p class="botoes_nome">CARRINHO</p></a>
                    </div>
                    <div class="entrar">
                        <a href="cadastro2.php"><img class="entrar_img" src="../icones/pessoas.png" alt=""></a>
                        <a href="cadastro2.php"><P class="botoes_nome">ENTRAR</P></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- fim do cabecalho roxo --> 

        <!-- inicio da cabecalho rosa -->
        <div class="cabecalho_rosa">
            <nav class="navbar navbar-expand-lg cabecalho_menu pe-xl-5">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>    
    
                    <div class="collapse navbar-collapse pe-xl-5" id="navbarSupportedContent">
                        <ul class="navbar-nav px-2 pe-xl-5">
                            <li class="nav-item pe-lg-5 col-lg-2 col-xl-2 pe-xxl-5"><a class="nav-link pe-xl-5" href="produtos.php">RECOMENDADO</a></li>
                            <li class="nav-item pe-lg-5 col-lg-1 ps-xl-1 pe-xxl-5"><a class="nav-link" href="produtos.php">ROUPA</a></li>
                            <li class="nav-item pe-lg-5 col-lg-2 ps-xl-5 pe-xxl-5"><a class="nav-link" href="produtos.php">CALÇADO</a></li>
                            <li class="nav-item pe-lg-5 col-lg-3 ps-xl-5 pe-xxl-5"><a class="nav-link" href="produtos.php">ELETRODOMÉSTICO</a></li>
                            <li class="nav-item pe-lg-5 col-lg-2 ps-xl-5"><a class="nav-link" href="produtos.php">ELETRÔNICO</a></li>
                            <li class="nav-item pe-lg-5 col-lg-2 ps-xl-5"><a class="nav-link" href="produtos.php">MÓVEL</a></li>
                        </ul>
                    </div>
            </nav>
        </div>
        
        <!-- fim do cabecalho rosa --> 
    </header>
    <!--fim do cabecalho-->
    
    <!--section da pagina-->
    <section class="primeiraSecao">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!--imagem do produto escolhido-->
                    <img class="produto_imagem img-fluid mt-md-5" src="../imagens/guardaRoupa.jpg" alt="">
                    <!--div com as informacoes do produto-->
                </div>
                <div class="col-md-4 p-3 mt-md-5">
                    <div class="produto_informacoes">
                        <p class="produto_nome">Guarda Roupa Casal 8 Portas 4 Gavetas Nevi Casa 812</p>
                        <p class="produto_cor"> <strong>Cor: </strong>Branco</p>
                        <p class="produto_descricao">R$ 999,90</p>
                        <p class="produto_valor">R$ 599,90</p>
                        <p class="produto_pagamento">até 10x  sem juros</p>
                        <img class="estrelas" src="../imagens/5estrelas.jpg" alt="">
                        <!--div com os botoes Comprar Agora e Adicionar ao Carrinho-->
                        <div class="produto_botoes">
                            <button class="comprarAgora">COMPRAR AGORA</button> <br>
                            <button class="adicionarCarrinho">ADICIONAR AO CARRINHO</button>
                        </div>
                        <!--div para os itens de calcular frete-->
                        <div class="calcularFrete">
                            <input class="frete" type="text" placeholder="Calcular Frete">
                            <button class="botaoFrete">CALCULAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
