<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
