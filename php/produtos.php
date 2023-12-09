<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <title>Produtos</title>
    
    <link rel="stylesheet" href="../css/produtos.css">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Inclua a biblioteca RateYo! via CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

    <link rel="stylesheet" href="jquery.rateyo.css"/>

</head>
<body>
    
    <!-- começo do cabecalho -->
    <?php
        error_reporting(0);
        session_start(); 

        include_once 'produto.php';

        //se a pargina for aberta quando o suaurio estiver buscando por um produto especifico
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['detalhe_produto'])){
            $_SESSION['codigo_produto'] = $_POST['codigo_produto'];
            
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'detalhe_produto.php';
            header("Location: http://$host$uri/$extra");
            
        }

        include_once "cabecalho2.php"; 
    ?>                
    <!--fim do cabecalho-->

    <section class="secaoPrincipal">
      <!-- div para os produtos-->
            <!--Filtro--> 
        <button class="btn d-lg-none botao_filtro" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasResponsive">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-filter-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M6 11.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>

        <!-- inicio do filtro do site -->
        <div class="offcanvas-lg offcanvas-start col-2" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasResponsiveLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasResponsiveLabel">FILTRO</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasResponsive" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body row">
                <form id="filtro" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="filtro">

                    <div class="preco">
                        <p class="filtro_titulo">Preço</p>
                        <div>
                            <label for="precoMin">Min.</label>
                            <input type="number" name="precoMin" id="precoMin">
                        </div>
                        <div>
                            <label for="precoMax">Max.</label>
                            <input type="number" name="precoMax" id="precoMax">
                        </div>                 
                    </div>                    

                    <div class="cor">
                        <p class="filtro_titulo">Desconto</p>
                        <input type="radio" name="desconto" value="10" id="10">
                        <label for="10">Acima de 10%</label><br>
                        <input type="radio" name="desconto" value="20" id="20">
                        <label for="20">Acima de 20%</label><br>
                        <input type="radio" name="desconto" value="30" id="30">
                        <label for="30">Acima de 30%</label><br>
                        <input type="radio" name="desconto" value="40" id="40">
                        <label for="40">Acima de 40%</label><br>
                        <input type="radio" name="desconto" value="50" id="50">
                        <label for="50">Acima de 50%</label><br>
                        <input type="radio" name="desconto" value="60" id="60">
                        <label for="60">Acima de 60%</label><br>
                        <input type="radio" name="desconto" value="70" id="70">
                        <label for="70">Acima de 70%</label><br>
                        <input type="radio" name="desconto" value="80" id="80">
                        <label for="80">Acima de 80%</label><br>
                        <input type="radio" name="desconto" value="90" id="90">
                        <label for="90">Acima de 90%</label><br>
                    </div>

                    <div class="marca">
                        <p class="filtro_titulo">Avaria</p>
                        <input type="radio" name="avaria" value="Arranhão" id="item1">
                        <label for="item1">Arranhão</label><br>
                        <input type="radio" name="avaria" value="Amassado" id="item2">
                        <label for="item2">Amassado</label><br>
                        <input type="radio" name="avaria" value="Mancha" id="item3">
                        <label for="item3">Mancha</label><br>
                        <input type="radio" name="avaria" value="Embalagem danificada" id="item4">
                        <label for="item4">Embalagem danificada</label><br>
                        <input type="radio" name="avaria" value="Modelo antigo" id="item5">
                        <label for="item5">Modelo antigo</label><br>
                        <input type="radio" name="avaria" value="Peça ausente ou substituída" id="item6">
                        <label for="item5">Peça ausente ou substituída</label><br>
                        <input type="radio" name="avaria" value="Item de devolução" id="item7">
                        <label for="item5">	Item de devolução</label><br>
                        <input type="radio" name="avaria" value="Pequeno defeito funcional" id="item8">
                        <label for="item5">Pequeno defeito funcional</label><br>
                    </div>
                    
                    <div class="avaliacao">
                        <p class="filtro_titulo">Avaliação do produto</p>
                        <input type="radio" name="avaliacao" value="5" id="">
                        <img class="estrelas" src="../imagens/5estrelas.jpg" alt=""><br>
                        <input type="radio" name="avaliacao" value="4" id="">
                        <img class="estrelas" src="../imagens/4estrelas.jpg" alt=""><br>
                        <input type="radio" name="avaliacao" value="3" id="">
                        <img class="estrelas" src="../imagens/3estrelas.jpg" alt=""><br>
                        <input type="radio" name="avaliacao" value="2" id="">
                        <img class="estrelas" src="../imagens/2estrelas.jpg" alt=""><br>
                        <input type="radio" name="avaliacao" value="1" id="">
                        <img class="estrelas" src="../imagens/1estrela.jpg" alt=""><br>
                    </div>
                    
                    <div class="produto_botoes">
                        <button type="submit" name="filtrar" class="comprarAgora">FILTRAR</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- fim do filtro do site -->     


        <div class="row produtos col-10">
            <?php
                if(isset($_POST['filtrar'])){
                    $precoMin = trim(filter_input(INPUT_POST,'precoMin',FILTER_SANITIZE_SPECIAL_CHARS));
                    $precoMax = trim(filter_input(INPUT_POST,'precoMax',FILTER_SANITIZE_SPECIAL_CHARS));
                    $desconto = trim(filter_input(INPUT_POST,'desconto',FILTER_SANITIZE_SPECIAL_CHARS));
                    $avaria = trim(filter_input(INPUT_POST,'avaria',FILTER_SANITIZE_SPECIAL_CHARS));
                    $avaliacao = trim(filter_input(INPUT_POST,'avaliacao',FILTER_SANITIZE_SPECIAL_CHARS));
                    
                    $desconto = intval($desconto);

                    //mantendo as variaveis de pesquisa ou categoria, para filtrar com base na busca anterior
                    if(isset($_SESSION['pesquisa'])){
                        $pesquisa = $_SESSION['pesquisa'];
                    }
                    else{
                        $pesquisa = '%';
                    }

                    if(isset($_SESSION['categoria_produto'])){
                        $categoria = $_SESSION['categoria_produto'];
                    }
                    else{
                        $categoria = '%';
                    }

                    //ajeitando os valores padroes do filtro
                    if($precoMin == ""){
                        $precoMin = 0;
                    }
                    if($precoMax == ""){
                        $precoMax = 1000000000;
                    }
                    if($desconto == ""){
                        $desconto = 0;
                    }
                    if($avaria == ""){
                        $avaria = '%';
                    }
                    if($avaliacao == ""){
                        $avaliacao = 0;
                    }

                    $produtos = new Produto();
                    $resultado = $produtos->filterProducts($precoMin,$precoMax,$desconto,$avaria,$avaliacao,$pesquisa,$categoria);
                }

                elseif(isset($_SESSION['categoria_produto'])){
                    //echo 'comeco da categoria';
                    $categoria = $_SESSION['categoria_produto'];

                    $produtos_categorizados = new Produto();
                    $resultado = $produtos_categorizados->categorizeProducts($categoria);
                    
                }
                elseif(isset($_SESSION['pesquisa'])){
                    //echo 'comeco da pesquisa';
                    $pesquisa = $_SESSION['pesquisa'];

                    $produtos = new Produto();
                    $resultado = $produtos->searchProducts($pesquisa);
                }
                
                //funcao que ira mostrar as estrelas de avaliacao de cada produto
                function starRating($starsTotal, $starsFilled) {
                    $output = '';
                    for ($i = 1; $i <= $starsTotal; $i++) {
                        if ($i <= $starsFilled) {
                            $output .= '<span class="filled span_stars">★</span>';
                        } else {
                            $output .= '<span class="empty span_stars">★</span>';
                        }
                    }
                    return $output;
                }

                for($i = 0; $i < sizeof($resultado); $i++){
                    ?> 

                    <div class="produto_dados col-5 col-md-3 col-xl-2">

                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <button type="submit" class="btn_produto" name="detalhe_produto">

                                <input type="hidden" name="codigo_produto" value="<?php echo $resultado[$i]['codigo']; ?>">

                                <div class="div_imgproduto" style="background-image: url('<?php echo $resultado[$i]['imagem']; ?>');"></div>
                                <p class="produto_desconto">
                                    <?php 
                                    $porcentagem = $resultado[$i]['desconto'] + $resultado[$i]['valor_atual'];
                                    $porcentagem = $resultado[$i]['desconto'] / $porcentagem * 100;
                                    echo round($porcentagem,0) . '%';
                                    ?>
                                </p>
                                <div class="produto_nome">
                                    <?php  
                                    //echo strlen($resultado[$i]['nome']);
                                    if(strlen($resultado[$i]['nome']) > 30){
                                        $novo_nome = substr($resultado[$i]['nome'],0,27);
                                        echo $novo_nome.'...';
                                    }
                                    else{
                                        echo $resultado[$i]['nome'];
                                    }
                                    
                                    ?>
                                </div>
                                <p class="produto_valor">R$ <?php echo number_format($resultado[$i]['valor_atual'],2); ?></p>

                                <?php echo starRating(5, $resultado[$i]['avaliacao']); ?>

                            </button>
                        </form>   
                                                 
                    </div>
                                            
                    <?php                                               
                }                 
            ?>            
        </div>
    </section>

    <?php
		include 'rodape.php';
	?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
