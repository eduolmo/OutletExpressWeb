
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/comprar.css">
    <script src="../js/comprar.js" defer></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <!-- cabecalho -->
    <?php
        //error_reporting(0);
        session_start();
        include_once 'produto.php';

        $codigo = $_SESSION['codigo_produto'];
        $codigo_cliente = $_SESSION['cliente']['codigo'];
        
        $produto = new Produto();
        $produto = $produto->productDetail($codigo);
        

        include 'cabecalho2.php';
    ?>	

    <!-- titulo da pagina de acordo com o nome do produto -->
    <title><?php echo $produto['nome']; ?></title>

    <!--section da pagina-->
    <section class="primeiraSecao">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!--imagem do produto escolhido-->
                    <img class="produto_imagem img-fluid mt-md-5 " src="<?php echo $produto['imagem']; ?>" alt="">
                    <!--div com as informacoes do produto-->
                </div>
                <div class="col-md-4 p-3 mt-md-5">
                    <div class="produto_informacoes">
                        <p class="produto_nome"><?php echo $produto['nome']; ?></p>
                        <p class="produto_valor">R$ <?php echo number_format($produto['valor_atual'],2); ?></p>
                        <p class="produto_pagamento">até 10x  sem juros</p>
                        <p class="produto_avaria"> <strong>Avaria:  </strong> <?php echo $produto['nomeAvaria']; ?></p>
                        <p class="produto_cor mb-0"> <strong>Descrição:  </strong><?php echo $produto['descricao']; ?></p>

                        <?php
                            function starRating($starsTotal, $starsFilled) {
                                $output = '<span>';
                                for ($i = 1; $i <= $starsTotal; $i++) {
                                    if ($i <= $starsFilled) {
                                        $output .= '<span class="filled span_stars">★</span>';
                                    } else {
                                        $output .= '<span class="empty span_stars">★</span>';
                                    }
                                }
                                return $output . '</span>';
                            }

                            echo starRating(5, $produto['avaliacao']);
                        ?>                        
                        
                        <div class="linhas"></div>
                        <!--div com os botoes Comprar Agora e Adicionar ao Carrinho-->
                        <div class="produto_botoes">
                            <form action="pedido.php" method="post">
                                <input type="hidden" name="nomeind" value="<?php echo $produto['nome']; ?>">
                                <input type="hidden" name="imagemind" value="<?php echo $produto['imagem']; ?>">
                                <input type="hidden" name="descricaoind" value="<?php echo $produto['descricao']; ?>">
                                <input type="hidden" name="quantidadeind" class="input-qtd" min="1" value="1">

                                <button type="submit" class="comprarAgora">COMPRAR AGORA</button>
                            </form>
                                <button class="adicionarCarrinho" data-codigo-cliente="<?php echo $codigo_cliente; ?>" data-codigo-produto="<?php echo $codigo;?>">ADICIONAR AO CARRINHO</button>
                        </div>

                        <div class="qtd mt-2 mb-0">
                            <button class="btn-qtd btn-minus">-</button>
                            <input class="input-qtd" id="quantidade" min="1" value="1" >
                            <button class="btn-qtd btn-plus">+</button>
                        </div>

                        <!--div para os itens de calcular frete-->
                        <div class="calcularFrete">
                            <input class="frete" type="text" placeholder="Calcular Frete">
                            <button class="botaoFrete">CALCULAR</button>
                        </div>

                    </div>
                </div>

                <section class="comentarios mt-4">
                   <div class="linha_central"></div>
                   <div class="d-flex">
                        <p class="m-3">Comente sua experiência:</p>
                        <input class=" m-3 comentar" type="text">
                    </div>
                    <div class="d-flex">
                    <p class="m-3">Avaliação do produto:</p>
                    <ul class="avaliacao2 d-flex">
                        <li class="star-icon ativo" data-avaliacao="1"></li>
                        <li class="star-icon" data-avaliacao="2"></li>
                        <li class="star-icon" data-avaliacao="3"></li>
                        <li class="star-icon" data-avaliacao="4"></li>
                        <li class="star-icon" data-avaliacao="5"></li>
                    </ul> 
                    <button class="botao m-3">Enviar</button>
                    </div>

                    <div class="linhas"></div>
                    <h4 class="p-3 titulo">Comentários</h4>
                    
                    <!--
                    <div class="d-flex comment-container align-items-start">
                        <img class="img-fluid perfil" src="../icones/perfil.png" alt="Imagem do perfil">
                        <div class="d-flex flex-column comment-content">
                            <p class="nome mb-0">Davi Santos</p>
                            <p class="mensagem mb-1">Adorei o produto, muito lindo!</p>
                            <ul class="rating d-flex align-self-start">
                                <li class="valor_comentario align-self-start" data-avaliacao="1"></li>
                                <li class="valor_comentario align-self-start" data-avaliacao="2"></li>
                                <li class="valor_comentario align-self-start" data-avaliacao="3"></li>
                                <li class="valor_comentario align-self-start" data-avaliacao="4"></li>
                                <li class="valor-comentario align-self-start" data-avaliacao="5"></li>
                            </ul>
                        </div>
                    </div>
                    -->
                    <?php
                        $produto_comentarios = new Produto();
                        $comentarios = $produto_comentarios->getComments($codigo);//pegar comentarios
                        
                        if($comentarios){                        
                            for($i = 0; $i < sizeof($comentarios); $i++){
                                ?>
                                <div class="d-flex flex-column comment-content mb-5">
                                    <div class="nome mb-1"> <?php echo $comentarios[$i]['nome']; ?> <?php echo starRating(5, $comentarios[$i]['avaliacao']); ?> </div>
                                    <div class="mensagem mb-2"> <?php echo $comentarios[$i]['conteudo']; ?> </div>
                                    <div class="linhas"></div>
                                </div>
                                
                                <?php
                            }                            
                        }                        
                        else{
                            echo "<div style='color:gray;margin-left:50px;margin-bottom:50px'>Não tem nenhum comentários neste produto</div>";
                        }                                               
                    ?>
                    


                </section>

            </div>
        </div>
    </section>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/adicionaritem.js"></script> 
</body>
</html>



