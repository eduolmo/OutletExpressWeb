<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/carrinho.css">
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/rodape.css">
    <link rel="icon" href="icones/icon.png">
    <script src="../js/adicionaritem.js" defer></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Titulo da Pagina-->
    <title>Carrinho</title>
</head>
<body>
    <!-- cabecalho -->
    <?php
        include 'cabecalho2.php';
        error_reporting(0);

        $codigo_cliente = $_SESSION['cliente']['codigo'];
    ?>	

    <!-- Container Principal -->      
    <main class="px-3 pb-3">
        <!-- Div do titulo carrinho de compras -->
        <div class="titulo-pag p-5 display-5 text-sm-1 fw-bold d-flex justify-content-around">Carrinho de Compras</div>
        <!-- Div com o conteudo -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-9">
                        <section>
                            <!-- Tabela que contém informações do produto -->
                            <div class="table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th class="col-6 col-sm-3">Produto</th>
                                            <th class="col-2 col-sm-2">Preço</th>
                                            <th class="col-2 col-sm-2">Quantidade</th>
                                            <th class="col-2 col-sm-2">Total</th>
                                            <th class="col-2 col-sm-2"></div></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Produtos com suas imagens, valores unitários e quantidades -->
                                        <?php
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
                                            <tr class="produto-item">
                                                <td>
                                                    <div class="produto patins">
                                                        <img class="produto-img" src="<?php echo $row['imagem']; ?>">
                                                        <div class="inf">
                                                            <div class="nome text-sm"><?php echo $row['nome'];?></div>
                                                            <div class="categoria"><?php echo $row['descricao'];?></div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="valor-unitario">R$ <?php echo $row['valor_atual']; ?></td>
                                                <!-- Restante do código para as outras colunas -->
                                                <td class="qtd-td">
                                                    <!-- Botão para aumentar e diminuir a quantidade de produtos -->
                                                    <div class="qtd">
                                                        <button class="btn-qtd btn-minus"><i class='bx bx-minus'></i></button>
                                                        <input class="input-qtd" type="number" value="<?php echo $row['quantidade'];?>" min="1">
                                                        <button class="btn-qtd btn-plus"><i class='bx bx-plus'></i></button>
                                                    </div>
                                                </td>
                                                <!-- Subtotal calculado pelo preço unitário multiplicado pela quantidade -->
                                                <td class="subtotal"></td>
                                                <!-- Botão para excluir o produto da tabela de itens -->
                                                <td><button class="delete"><i class='bx bx-x'></i></button></td>
                                            </tr>
                                        <?php
                                                }
                                            } catch (PDOException $e) {
                                                echo "Erro na execução da consulta: " . $e->getMessage();
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                    <div class="col-12 col-sm-3">
                        <!-- Div com as informações da compra -->
                        <aside>
                            <!-- Conteúdo da div -->
                            <div class="inf">
                                <div class="inf-title justify-content-around">Informações da Compra</div>
                                <div><span>Sub-total</span><span id="subtotal-compra"></span></div>
                                <div><span>Frete</span><span>R$20,00</span></div>
                                <div>
                                    <!-- Botao que adiciona o cupom de desconto -->
                                    <button>
                                        Adicione um cupom de desconto
                                        <img src="../icones/cupom-de-desconto.png" class="cupom">
                                    </button>
                                </div>
                            </div>

                            <div class="total">
                                <div class="total-title">Total:</div>
                                <div id="total-value"></div>
                            </div>
                            <!-- Botao para encerrar a compra -->
                            <button class="btn-finalizar">Finalizar Compra</button>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
        include 'rodape.php';
    ?>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/carrinho.js"></script>
</body>
</html>
