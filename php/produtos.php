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
                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['categoria_produto'])){
                    $categoria = $_POST['categoria_produto'];
        
                    include_once 'produto.php';

                    $produtos_categorizados = new Produto();
                    $resultado = $produtos_categorizados->categorizeProducts($categoria);

                    //echo var_dump($resultado);
                    //echo 'pular linha kkk ';
                    //echo $resultado[1]['nome'];
                    
                    
                    for($i = 0; $i < sizeof($resultado); $i++){
                        //echo 'i: '.$i;
                        //echo $resultado[$i]['nome'];
                        ?> 
                        
                        <a href="detalhe_produto.php" class="row">
                            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                                <img class="img-fluid" src="<?php echo $resultado[$i]['imagem'] ?>" alt="">
                                <p class="produto_nome"><?php echo $resultado[$i]['nome'] ?></p>
                                <p class="produto_valor">R$ <?php echo $resultado[$i]['valor_atual'] ?></p>
                                <img class="estrelas" src="../imagens/5estrelas.jpg" alt="">
                            </div>
                        </a>

                        
                        
                        
                        <?php
                        /*
                        <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                            <a href="carrinhoBebe.php"><img class="img-fluid" src=<?php echo $resultado[$i]['imagem'] ?> alt=""></a>
                            <a href="carrinhoBebe.php"><p class="produto_nome"><?php echo $resultado[$i]['nome'] ?></p></a>
                            <a href="carrinhoBebe.php"><p class="produto_descricao">R$ 2.199,99</p></a>
                            <a href="carrinhoBebe.php"><p class="produto_valor">R$ 1.699,99</p></a>
                            <a href="carrinhoBebe.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
                        </div>
                        */
                    }
                    
                }
            ?>

            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="carrinhoBebe.php"><img class="img-fluid" src="../imagens/carrinho.jpg" alt=""></a>
                <a href="carrinhoBebe.php"><p class="produto_nome">Carrinho de Bebê Premium Preto Importado</p></a>
                <a href="carrinhoBebe.php"><p class="produto_descricao">R$ 2.199,99</p></a>
                <a href="carrinhoBebe.php"><p class="produto_valor">R$ 1.699,99</p></a>
                <a href="carrinhoBebe.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="blusa.php"><img class="img-fluid" src="../imagens/blusa2.jpg" alt=""></a>
                <a href="blusa.php"><p class="produto_nome">Blusa Manga Curta Feminina Estampa <br> Rosa e Amarelo</p></a>
                <a href="blusa.php"><p class="produto_descricao">R$ 99,99</p></a>
                <a href="blusa.php"><p class="produto_valor">R$ 59,99</p></a>
                <a href="blusa.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="computador.php"><img class="img-fluid" src="../imagens/computador.jpg" alt=""></a>
                <a href="computador.php"><p class="produto_nome">ComputadorAMD 10-Core, CPU 3.8Ghz <br> 8GB, Radeon R5 2GB, SSD e HD 2TB, Kit <br> Gamer Skill Monitor HDMI LED 19.5" Casual</p></a>
                <a href="computador.php"><p class="produto_descricao">R$ 1.997,90</p></a>
                <a href="computador.php"><p class="produto_valor">R$ 1.199,99</p></a>
                <a href="computador.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="cama.php"><img class="img-fluid" src="../imagens/cama.jpg" alt=""></a>
                <a href="cama.php"><p class="produto_nome">Cama Casal Madeira Maciça - Lisboa - <br> Móveis Montanhês</p></a>
                <a href="cama.php"><p class="produto_descricao">R$ 1.954,99</p></a>
                <a href="cama.php"><p class="produto_valor">R$ 1.599,99</p></a>
                <a href="cama.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="celular.php"><img class="img-fluid" src="../imagens/celular2.jpg" alt=""></a>
                <a href="celular.php"><p class="produto_nome">Celular Samsung Galaxy A31</p></a>
                <a href="celular.php"><p class="produto_descricao">R$ 1.899,99</p></a>
                <a href="celular.php"><p class="produto_valor">R$ 1.199,99</p></a>
                <a href="celular.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="salto.php"><img class="img-fluid" src="../imagens/salto2.jpg" alt=""></a>
                <a href="salto.php"><p class="produto_nome">Salto Scarpin Vemelho</p></a>
                <a href="salto.php"><p class="produto_descricao">R$ 199,99</p></a>
                <a href="salto.php"><p class="produto_valor">R$ 99,99</p></a>
                <a href="salto.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="tenis.php"><img class="img-fluid" src="../imagens/tenis.jpg" alt=""></a>
                <a href="tenis.php"><p class="produto_nome">Tenis Nike Air Max Vermelho</p></a>
                <a href="tenis.php"><p class="produto_descricao">R$ 399,99</p></a>
                <a href="tenis.php"><p class="produto_valor">R$ 199,99</p></a>
                <a href="tenis.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="fogao.php"><img class="img-fluid" src="../imagens/fogao2.jpg" alt=""></a>
                <a href="fogao.php"><p class="produto_nome">Fogão 4 Bocas a Gás - Automático</p></a>
                <a href="fogao.php"><p class="produto_descricao">R$ 1091,99</p></a>
                <a href="fogao.php"><p class="produto_valor">R$ 894,99</p></a>
                <a href="fogao.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="geladeira.php"><img class="img-fluid" src="../imagens/geladeira2.jpg" alt=""></a>
                <a href="geladeira.php"><p class="produto_nome">Geladeira Samsung French Door 530 Litros <br> Inox 110V</p></a>
                <a href="geladeira.php"><p class="produto_descricao">R$ 20.899,00</p></a>
                <a href="geladeira.php"><p class="produto_valor">R$18.899,00</p></a>
                <a href="geladeira.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="guardaRoupa.php"><img class="img-fluid" src="../imagens/guardaRoupa.jpg" alt=""></a>
                <a href="guardaRoupa.php"><p class="produto_nome">Guarda Roupa Casal 8 Portas 4 Gavetas <br> Nevi Casa 812</p></a>
                <a href="guardaRoupa.php"><p class="produto_descricao">R$ 999,90</p></a>
                <a href="guardaRoupa.php"><p class="produto_valor">R$ 599,90</p></a>
                <a href="guardaRoupa.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="maquinaLavar.php"><img class="img-fluid" src="../imagens/maquinaLavar2.jpg" alt=""></a>
                <a href="maquinaLavar.php"><p class="produto_nome">Máquina de Lavar Consul 17kg Branca <br> com Lavagem Econômica <br> e Ciclo Edredom</p></a>
                <a href="maquinaLavar.php"><p class="produto_descricao">R$ 1.994,99</p></a>
                <a href="maquinaLavar.php"><p class="produto_valor">R$ 1.494,99</p></a>
                <a href="maquinaLavar.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="mesa.php"><img class="img-fluid" src="../imagens/mesa.jpeg" alt=""></a>
                <a href="mesa.php"><p class="produto_nome">Conjunto Sala de Jantar Mesa Tampo MDF <br> e Vidro e 4 Cadeiras Lottus</p></a>
                <a href="mesa.php"><p class="produto_descricao">R$ 1.959,90</p></a>
                <a href="mesa.php"><p class="produto_valor">R$ 1.259,90</p></a>
                <a href="mesa.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="notebook.php"><img class="img-fluid" src="../imagens/notebook.jpg" alt=""></a>
                <a href="notebook.php"><p class="produto_nome">Notebook Gamer Lenovo Gaming 3i Intel <br> Core i5-11300H, GeForce GTX1650, 8GB RAM, <br> SSD 512GB, 15.6 Full HD,Preto</p></a>
                <a href="notebook.php"><p class="produto_descricao">R$ 3.999,99</p></a>
                <a href="notebook.php"><p class="produto_valor">R$ 3.199,99</p></a>
                <a href="notebook.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="televisao.php"><img class="img-fluid" src="../imagens/televisao.jpg" alt=""></a>
                <a href="televisao.php"><p class="produto_nome">Televisão 32 Tela Plana Hd Hdmi Usb Digital</p></a>
                <a href="televisao.php"><p class="produto_descricao">R$ 2.769,99</p></a>
                <a href="televisao.php"><p class="produto_valor">R$ 1.969,99</p></a>
                <a href="televisao.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
            <div class="produto_dados col-5 col-md-3 col-xl-2 ps-md-3 mt-3">
                <a href="ventilador.php"><img class="img-fluid" src="../imagens/ventilador2.jpg" alt=""></a>
                <a href="ventilador.php"><p class="produto_nome">Ventilador de Mesa Mallory Turbo TS30 <br> 30 cm 6 Pás 3 Velocidades</p></a>
                <a href="ventilador.php"><p class="produto_descricao">R$ 99,99</p></a>
                <a href="ventilador.php"><p class="produto_valor">R$ 69,99</p></a>
                <a href="ventilador.php"><img class="estrelas" src="../imagens/5estrelas.jpg" alt=""></a>
            </div>
        </div>
    </section>

    <?php
		include 'rodape.php';
	?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
