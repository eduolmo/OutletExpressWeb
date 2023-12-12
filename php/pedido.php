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
        error_reporting(0);
        session_start();

        include_once 'produto.php';        
        include 'item_carrinho.php';
        include 'item_compra.php';

        //finalizarCompra();
        
        $codigo_produto = $_SESSION['codigo_produto'];
        $codigo_cliente = $_SESSION['cliente']['codigo'];

        $produto = new Produto();
        $produto = $produto->productDetail($codigo_produto);

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar_agora'])){ 

            $quantidadeind = $_POST['quantidadeind']; 
            $_SESSION['quantidade_produto'] = $quantidadeind;
        }    

        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comprar_tudo'])){

            include 'dados_compra.php';
            //inserir em compra
            include 'compra_bd.php';

            $compra = new Compra();	
            
            //informa os dados do cliente
            $compra->setPagamento($pagamento);
            $compra->setData($data_hora);
            
            $compra->insert($codigo_cliente); 

            $compra_hora = $compra->consulta($data_hora);
            $_SESSION['codigo_compra'] = $compra_hora['codigo'];
            $fk_compra_codigo = $_SESSION['codigo_compra'];
        
            if($_SESSION['veio_carrinho']){
                $pegar_item_carrinho = Database::prepare("SELECT * FROM ITEM_CARRINHO INNER JOIN CLIENTE ON(cliente.fk_usuario_codigo = item_carrinho.fk_cliente_fk_usuario_codigo) WHERE item_carrinho.fk_cliente_fk_usuario_codigo = :codigo_cliente");
				$pegar_item_carrinho->bindParam(':codigo_cliente', $codigo_cliente);
				$pegar_item_carrinho->execute();
				$itens_carrinho = $pegar_item_carrinho->fetchAll(PDO::FETCH_ASSOC);

				for($i = 0; $i < sizeof($itens_carrinho); $i++){
					
					$pegar_valor_item = Database::prepare("SELECT valor_atual FROM PRODUTO WHERE codigo = :codigo_produto");
					$pegar_valor_item->bindParam(':codigo_produto', $itens_carrinho[$i]['fk_produto_codigo']);
					$pegar_valor_item->execute();
					$valor_item = $pegar_valor_item->fetch(PDO::FETCH_ASSOC);

					$itemcompra_insercao = Database::prepare("INSERT INTO ITEM_COMPRA(valor_item, fk_compra_codigo, fk_produto_codigo, quantidade) VALUES(:valor_item, :fk_compra_codigo, :fk_produto_codigo, :qtd)");
					$itemcompra_insercao->bindParam(':valor_item', $valor_item['valor_atual']); // Ajuste aqui
					$itemcompra_insercao->bindParam(':fk_compra_codigo', $fk_compra_codigo);
					$itemcompra_insercao->bindParam(':fk_produto_codigo', $itens_carrinho[$i]['fk_produto_codigo']);
					$itemcompra_insercao->bindParam(':qtd', $itens_carrinho[$i]['quantidade']);
					$itemcompra_insercao->execute();

					//remover da tabela ItemCarrinho os itens comprados pelo cliente
					$deleta_carrinho = Database::prepare("DELETE FROM ITEM_CARRINHO WHERE fk_cliente_fk_usuario_codigo = :codigo_cliente");
					$deleta_carrinho->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
					$deleta_carrinho->execute();
                }
            }
            else{                

                //inserir na tabela item_compra
                $item_compra = new Item_compra();

                $valor_produto = $produto['valor_atual'];
                $quantidadeP = $_SESSION['quantidade_produto'];

                $item_compra->setvalor($valor_produto);
                $item_compra->setCompraCodigo($fk_compra_codigo);
                $item_compra->setProdutoCodigo($codigo_produto);
                $item_compra->setQuantidade($quantidadeP);
                
                $item_compra->insere_item_compra();

                //session_unset($_SESSION['quantidade_produto']);
            }
            

            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
        }
           

        include 'cabecalho2.php';

        //echo $produto['quantidade'];
    ?>	
    <section class="finaliza_compra">
        <div class="container">
        <form id="formEntrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                    <h5 class="p-3">Finalize sua compra</h5>
                    <div class="linhas m-2"></div>

                    <!--Campo para digitar o cpf -->
                    <div class="endereço col-12 p-1 ">
                        <p class="titulo m-2">Informe seu CPF</p>
                        <input type="text" class="m-3 comentar" id="cep" name="cpf" placeholder="    CPF">
                    </div>

                    <div class="linhas m-2"></div>
                    <!--Campo para digitar o endereço -->
                    <div class="endereço col-12 p-1 ">
                        <p class="titulo m-2">Endereço</p>
                        <input type="text" class="m-3 comentar" id="cep" name="cep" placeholder="    CEP">
                        <input type="text" class="m-3 comentar" id="numero" name="numero" placeholder="    Número">
                        <input type="text" class="m-3 comentar" id="logradouro" name="logradouro" placeholder="    Logradouro"> 
                    </div>
                    <div class="linhas m-2"></div>
                    <!--Selecionar o método de pagamento com um input tipo radio-->
                    <div class="pagamento">
                        <p class="titulo m-2">Método de pagamento</p>
                        <div class="cor">
                        <input type="radio" class="m-3" id="pix" name="opcao" value="pix">
                        <label for="pix">Pix</label>
                        <div class="linhas_pagamento m-2"></div>
                        <input type="radio" class="m-3" id="cartao_credito" name="opcao" value="credito">
                        <label for="cartao_credito">Cartão de Crédito</label>
                        <div class="linhas_pagamento m-2"></div>
                        <input type="radio" class="m-3" id="cartao_debito" name="opcao" value="debito">
                        <label for="cartao_debito">Cartão de Débito</label>
                        <div class="linhas_pagamento m-2"></div>
                        <input type="radio" class="m-3" id="boleto" name="opcao" value="boleto">
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

                                //session_unset($_SESSION['veio_carrinho']);
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
                                    $_SESSION['veio_carrinho'] = TRUE;

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


                    <div class="col-md-5 mt-5">
                        <aside>
                            <!--Div com as informacoes da compra-->
                            <div class="inf">
                            <div class="inf-title justify-content-around">Informações da Compra</div>
                            <div><span>Frete</span><span>GRÁTIS</span></div>
                        </div>

                        <div class="total">
                            <div class="total-title">Total: <?php 
                            $valor_produto = $produto['valor_atual'];
                            $total = $valor_produto * $quantidadeind;
                            echo $total; 

                            ?>
                            </div>
                            <div id="total-value"></div>
                        </div>
                        <!--Botao para encerrar a compra-->
                        <button class="btn-finalizar" type="submit" name="comprar_tudo"  data-codigo-cliente="" id="abrir_modal" onclick="imprimir()">Concluir compra</button>
                        <!--
                        <div id="fade" class="hide"></div>
                        <div id="modal" class="hide">
                            <div class="modal-cabecalho">
                                <h2 class="modal-titulo">Sua compra foi feita com sucesso</h2>
                                <p>Obrigada por comprar no Outlet Express!</p>
                                <button id="fechar_modal" name="volta_index" onclick="window.location.href='index.php'">Voltar a página inicial</button>
                            </div>
                        </div> -->
                    </div>
        </form>                    
        </div>
   
    </section>
    

    <?php
        
	?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/pedido.js"></script>   
</body>
</html>
