<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computador</title>
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/comprar.css">
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
                    <img class="produto_imagem mt-md-5" src="../imagens/computador.jpg" alt="">
                </div>
                <div class="col-md-4 p-3 mt-md-5">
                    <div class="produto_informacoes">
                        <p class="produto_nome">ComputadorAMD 10-Core, CPU 3.8Ghz 8GB, Radeon R5 2GB, SSD <br>e HD 2TB, Kit Gamer Skill Monitor HDMI LED 19.5" Casual</p>
                        <p class="produto_cor"> <strong>Cor: </strong>Preto</p>
                        <p class="produto_descricao">R$ 1.997,90</p>
                        <p class="produto_valor">R$ 1.199,99</p>
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
