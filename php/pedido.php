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
        include 'item_carrinho.php';

        //finalizarCompra();
        
        
        $codigo_cliente = $_SESSION['cliente']['codigo'];
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
                    
                    <div>
                        <p class="titulo m-3">Produtos</p>
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $nomeind = $_POST['nomeind'];
                                $imagemind = $_POST['imagemind'];
                                $descricaoind = $_POST['descricaoind'];
                                $quantidadeind = $_POST['quantidadeind'];
                                ?>
                                <tr class="col-md-6">
                                    <div class="produtos">
                                        <td>
                                            <div class="revisao d-flex">
                                                <img class="imagem img-fluid" src="<?php echo $imagemind; ?>" alt="">
                                                <div class="informacoes">
                                                    <div class="p-3"><?php echo $nomeind; ?></div>
                                                    <div class="p-3"><?php echo $descricaoind; ?></div>
                                                    <div class="p-3">Quantidade: <?php echo $quantidadeind; ?></div>
                                                </div>
                                            </div>
                                        </td>
                                    </div>
                                </tr>
                            <?php
                            } else {
                                try {
                                    $listagem = Database::prepare("
                                        SELECT ic.*, p.*, cp.*
                                        FROM item_carrinho ic
                                        JOIN produto p ON ic.fk_PRODUTO_codigo = p.codigo
                                        JOIN cliente c ON ic.fk_CLIENTE_FK_USUARIO_codigo = c.fk_USUARIO_codigo
                                        JOIN categoria_produto cp ON p.FK_CATEGORIA_PRODUTO_codigo = cp.codigo
                                        WHERE c.fk_USUARIO_codigo = :codigo_cliente
                                    ");
                                    $listagem->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
                                    $listagem->execute();
                                    while ($row = $listagem->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                        <tr class="col-md-4">
                                            <div class="produtos">
                                                <td>
                                                    <div class="revisao d-flex">
                                                        <img class="imagem img-fluid" src="<?php echo $row['imagem']; ?>" alt="">
                                                        <div class="informacoes">
                                                            <div class="p-3"><?php echo $row['nome']; ?></div>
                                                            <div class="p-3"><?php echo $row['descricao']; ?></div>
                                                            <div class="p-3">Quantidade: <?php echo $row['quantidade']; ?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </div>
                                        </tr>
                            <?php
                                    }
                                } catch (PDOException $e) {
                                    echo "Erro na execução da consulta: " . $e->getMessage();
                                }
                            }
                            ?>


                    <div class="col-md-4 col-sm-3 mt-5">
                        <aside>
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
                        <button class="btn-finalizar" data-codigo-cliente="<?php echo $codigo_cliente; ?>" id="abrir_modal" onclick="imprimir()">Concluir compra</button>
                        <div id="fade" class="hide"></div>
                        <div id="modal" class="hide">
                            <div class="modal-cabecalho">
                                <h2 class="modal-titulo">Sua compra foi feita com sucesso</h2>
                                <p>Obrigada por comprar no Outlet Express!</p>
                                <button id="fechar_modal" onclick="window.location.href='index.php'">Voltar a página inicial</button>
                            </div>
                        </div>
                    </div>
                            
        </div>
   
    </section>
    

    <?php
	
	?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/pedido.js"></script>   
</body>
</html>
