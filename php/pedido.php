
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize sua compra</title>
    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/pedido.css">
    
    <script src="../js/pedido_modal.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <!-- cabecalho -->
    <?php
        include 'cabecalho2.php';
    ?>	
    <section class="finaliza_compra">
        <div class="container">
            <div class="row">
                    <h5 class="p-3">Finalize sua compra</h5>
                    <div class="linhas m-2"></div>
                    <!--Campo para digitar o endereço -->
                    <div class="endereço col-12 p-1 ">
                        <p class="titulo m-2">Endereço</p>
                        <input type="text" class="m-3 comentar" id="cep" name="cep" placeholder="CEP">
                        <input type="text" class="m-3 comentar" id="cidade" name="cidade" placeholder="Cidade">
                        <input type="text" class="m-3 comentar" id="bairro" name="bairro" placeholder="Bairro">
                        <input type="text" class="m-3 comentar" id="numero" name="numero" placeholder="Número">
                        <input type="text" class="m-3 comentar" id="logradouro" name="logradouro" placeholder="Logradouro"> 

                        <input type="button" class="m-3 botao_endereco" value="Salvar Endereço">

                    </div>
                    <div class="linhas m-2"></div>
                    <!--Selecionar o método de pagamento com um input tipo radio-->
                    <div class="pagamento">
                        <p class="titulo m-2">Método de pagamento</p>
                        <div class="cor">
                        <input type="radio" class="m-3" id="pix" name="opcao">
                        <label for="pix">Pix</label>
                        <div class="linhas_pagamento m-2"></div>
                        <input type="radio" class="m-3" id="cartao_credito" name="opcao">
                        <label for="cartao_credito">Cartão de Crédito</label>
                        <div class="linhas_pagamento m-2"></div>
                        <input type="radio" class="m-3" id="cartao_debito" name="opcao">
                        <label for="cartao_debito">Cartão de Débito</label>
                        <div class="linhas_pagamento m-2"></div>
                        <input type="radio" class="m-3" id="boleto" name="opcao">
                        <label for="boleto">Boleto</label>
                        </div>
                    </div>
                    <!--Revisão dos produtos-->
                    <div class="d-flex flex-md-row flex-column">
                        

                        <div class="produtos col-md-6">
                            <p class="titulo m-3">Produtos</p>
                            <div class="revisao d-flex">
                                <img class="img-fluid" src="../imagens/patins.png" alt="">
                                <div class="informacoes">
                                    <h5 class="p-3">Patins Inline Roller - Calçados</h5>
                                    <p class="p-3">R$ 99,00</p>
                                </div>
                            </div>
                            <div class="revisao d-flex">
                                <img class="img-fluid" src="../imagens/patins.png" alt="">
                                <div class="informacoes">
                                    <h5 class="p-3">Patins Inline Roller - Calçados</h5>
                                    <p class="p-3">R$ 99,00</p>
                                </div>
                            </div>
                        </div> 

                        <aside class="col-md-6 col-sm-12 m-3">
                            <!--Div com as informacoes da compra-->
                            <div class="inf">
                            <div class="inf-title justify-content-around">Informações da Compra</div>
                            <div ><span>Sub-total</span><span id="subtotal-compra">R$438</span></div>
                            <div><span>Frete</span><span>R$20,00</span></div>
                        </div>

                        <div class="total">
                            <div class="total-title">Total:</div>
                            <div id="total-value"></div>
                        </div>
                        <!--Botao para encerrar a compra-->
                        <button class="btn-finalizar" id="abrir_modal" onclick="imprimir()">Concluir compra</button>
                        <div id="fade" class="hide"></div>
                        <div id="modal" class="hide">
                            <div class="modal-cabecalho">
                                <h2 class="modal-titulo">Sua compra foi feita com sucesso</h2>
                                <p>Obrigada por comprar no Outlet Express!</p>
                                <button id="fechar_modal" onclick="window.location.href='index.php'">Voltar a página inicial</button>
                            </div>
                        </div>

                            
        </div>
   
    </section>
    

    <?php
	
	?>
    
</body>
</html>
