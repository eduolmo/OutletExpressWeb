<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de bebe</title>
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/comprar.css">
    <link rel="stylesheet" href="../css/rodape.css">
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
                    <img class="produto_imagem img-fluid mt-md-5" src="../imagens/carrinho.jpg" alt="">
                    <!--div com as informacoes do produto-->
                </div>
                <div class="col-md-4 p-3">
                    <div class="produto_informacoes">
                        <p class="produto_nome">Carrinho de Bebê Premium Importado</p>
                        <p class="produto_cor"> <strong>Cor: </strong>Preto</p>
                        <p class="produto_descricao">R$ 2.199,99</p>
                        <p class="produto_valor">R$ 1.699,99</p>
                        <p class="produto_pagamento">até 10x  sem juros</p>
                        <p class="produto_avaria"> <strong>Avaria: </strong>Queima de estoque</p>
                        <p class="produto_cor"> <strong>Descrição: </strong>Descrição do produto com dimensões</p>
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
                    
                    <div class="produto_avaliacao">
                        <p class="avaliacao">Avaliação</p>
                        <p class="avaliacao_valor">5.0</p>
                        <img class="estrelas" src="../imagens/5estrelas.jpg" alt="">
                    </div>
                    
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Comentários
                    </button>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="comentario">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>   
                                <p class="comentario_nome">Paulo</p>
                                <img class="estrelas" src="../imagens/5estrelas.jpg" alt="">
                                <p class="comentario_texto">Ótimo prduto! Chegou em perfeito estado</p>           
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </section>

    <?php
		include 'rodape.php';
	?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>