
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de bebê</title>
    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/comprar.css">
    <script src="../js/comprar.js" defer></script>
    <script src="../js/quantidade.js" defer></script>

    
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <!-- cabecalho -->
    <?php
        include 'cabecalho2.php';
    ?>	
    
    <!--section da pagina-->
    <section class="primeiraSecao">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!--imagem do produto escolhido-->
                    <img class="produto_imagem img-fluid mt-md-5 " src="../imagens/carrinho.jpg" alt="">
                    <!--div com as informacoes do produto-->
                </div>
                <div class="col-md-4 p-3 mt-md-5">
                    <div class="produto_informacoes">
                    <p class="produto_nome">Carrinho de Bebê Premium Importado</p>
                        <p class="produto_cor"> <strong>Cor: </strong>Preto</p>
                        <p class="produto_descricao">R$ 2.199,99</p>
                        <p class="produto_valor">R$ 1.699,99</p>
                        <p class="produto_pagamento">até 10x  sem juros</p>
                        <p class="produto_avaria"> <strong>Avaria: </strong>Queima de estoque</p>
                        <p class="produto_cor mb-0"> <strong>Descrição: </strong>Descrição do produto com dimensões</p>
                        <ul class="rating d-flex">
                            <li class="valor" data-avaliacao="1"></li>
                            <li class="valor" data-avaliacao="2"></li>
                            <li class="valor" data-avaliacao="3"></li>
                            <li class="valor" data-avaliacao="4"></li>
                            <li class="valor" data-avaliacao="5"></li>
                        </ul>

                        <div class="linhas"></div>
                        <!--div com os botoes Comprar Agora e Adicionar ao Carrinho-->
                        <div class="produto_botoes">
                             <!-- Botão para aumentar e diminuir a quantidade de produtos -->

                            <button class="comprarAgora" onclick="window.location.href='pedido.php'">COMPRAR AGORA</button> <br>
                            <button class="adicionarCarrinho" onclick="window.location.href='carrinho.php'">ADICIONAR AO CARRINHO</button>
                        </div>
                        <div class="qtd mt-2 mb-0">
                            <button class="btn-qtd" onclick="DiminuirQuantidade()">-</button>
                            <input class="input-qtd" id="quantidade" min="1" value="1" readonly>
                            <button class="btn-qtd" onclick="AumentarQuantidade()">+</button>
                        </div>
                        <!--div para os itens de calcular frete-->
                        <div class="calcularFrete">
                            <input class="frete" type="text" placeholder="Calcular Frete">
                            <button class="botaoFrete">CALCULAR</button>
                        </div>
                    </div>
                </div>
                <section class="comentarios">
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

                    


                </section>

            </div>
        </div>
    </section>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
