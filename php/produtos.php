<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/produtos.css">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <!-- começo do cabecalho -->
    <?php
        include "cabecalho2.php";        
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
                <div class="filtro">
                    <div class="categoria">
                        <p class="filtro_titulo">Tipo de produto</p>
                        <input type="checkbox" name="" id="tipo1">
                        <label for="tipo1">Masculino</label><br>
                        <input type="checkbox" name="" id="tipo2">
                        <label for="tipo2">Feminino</label><br>
                        <input type="checkbox" name="" id="tipo3">
                        <label for="tipo3">Computador</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Celular</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Carrinho de bebe</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Salto</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Cama</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Tênis</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Fogão</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Geladeira</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Guarda-Roupa</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Máquna de lavar</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Notebook</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Ventilador</label><br>
                        <input type="checkbox" name="" id="tipo4">
                        <label for="tipo4">Televisão</label><br>
                    </div>
    
                    <div class="preco">
                        <p class="filtro_titulo">Preço</p>
                        <input type="number">
                    </div>

                    <div class="marca">
                        <p class="filtro_titulo">Marca</p>
                        <input type="checkbox" name="" id="item1">
                        <label for="item1">Nike</label><br>
                        <input type="checkbox" name="" id="item2">
                        <label for="item2">Brastemp</label><br>
                        <input type="checkbox" name="" id="item3">
                        <label for="item3">Samsung</label><br>
                        <input type="checkbox" name="" id="item4">
                        <label for="item4">Consul</label><br>
                        <input type="checkbox" name="" id="item5">
                        <label for="item5">Lenovo</label><br>
                        <input type="checkbox" name="" id="item5">
                        <label for="item5">Mallory</label><br>
                    </div>

                    <div class="cor">
                        <p class="filtro_titulo">Cor</p>
                        <input type="checkbox" name="" id="cor1">
                        <label for="cor1">Inox</label><br>
                        <input type="checkbox" name="" id="cor2">
                        <label for="cor2">Preto</label><br>
                        <input type="checkbox" name="" id="cor3">
                        <label for="cor3">Branco</label><br>
                    </div>

                    <div class="avaliacao">
                        <p class="filtro_titulo">Avaliação do produto</p>
                        <input type="checkbox" name="" id="">
                        <img class="estrelas" src="../imagens/5estrelas.jpg" alt=""><br>
                        <input type="checkbox" name="" id="">
                        <img class="estrelas" src="../imagens/4estrelas.jpg" alt=""><br>
                        <input type="checkbox" name="" id="">
                        <img class="estrelas" src="../imagens/3estrelas.jpg" alt=""><br>
                        <input type="checkbox" name="" id="">
                        <img class="estrelas" src="../imagens/2estrelas.jpg" alt=""><br>
                        <input type="checkbox" name="" id="">
                        <img class="estrelas" src="../imagens/1estrela.jpg" alt=""><br>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- fim do filtro do site -->     


        <div class="row produtos col-10">
            <?php
                if(isset($_SESSION['categoria_produto'])){
                    $categoria = $_SESSION['categoria_produto'];

                    include_once 'produto.php';

                    $produtos_categorizados = new Produto();
                    $resultado = $produtos_categorizados->categorizeProducts($categoria);
                    
                    for($i = 0; $i < sizeof($resultado); $i++){
                        ?> 
                        <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                            
                            <a href="carrinhoBebe.php">
                                <div display="hidden"><?php echo $resultado[$i]['codigo'] ?></div>
                                <!--
                                <div class="div_imgproduto p-1">
                                    <img class="img-fluid produto_imagem col-12" src=<?php //echo $resultado[$i]['imagem'] ?> alt="">
                                </div>
                                -->
                                <div class="div_imgproduto" style="background-image: url('<?php echo $resultado[$i]['imagem']; ?>');"></div>
                                <p class="produto_desconto">
                                    <?php 
                                    $porcentagem = $resultado[$i]['desconto'] + $resultado[$i]['valor_atual'];
                                    $porcentagem = $resultado[$i]['desconto'] / $porcentagem * 100;
                                    echo round($porcentagem,0) . '%';
                                    ?>
                                </p>
                                <p class="produto_nome">
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
                                </p>
                                <p class="produto_valor">R$ <?php echo $resultado[$i]['valor_atual'] ?></p>
                                <img class="estrelas" src="../imagens/5estrelas.jpg" alt="">
                            </a>
                        </div>                        
                        <?php                        
                    }                    
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
