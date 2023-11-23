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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--Titulo da Pagina-->
    <title>Carrinho</title>
</head>
<body>
    <!-- cabecalho -->
    <?php
        include 'cabecalho2.php';

        $codigo_cliente = $_SESSION['codigo_cliente'];
    ?>	

  <!--Container Principal-->      
  <main class="px-3 pb-3">
      <!--Div do titulo carrinho de compras-->
      <div class="titulo-pag p-5 display-5 text-sm-1 fw-bold d-flex justify-content-around">Carrinho de Compras</div>
      <!--Div com o conteudo-->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12 col-sm-9" >
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
                              <th class="col-2 col-sm-2"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Primeiro produto com sua imagem, valor unitário e quantidade -->
                            <?php
                              try {
                                $listagem = $db_con->prepare("
                                  SELECT ic.*, p.* 
                                  FROM item_carrinho ic
                                  JOIN produto p ON ic.fk_PRODUTO_codigo = p.codigo
                                  JOIN cliente c ON ic.fk_CLIENTE_FK_USUARIO_codigo = c.codigo
                                  WHERE c.codigo = :codigo_cliente
                                ");
                                $listagem->execute();
                                while ($row = $listagem->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                  <tr class="produto-item">
                                      <td>
                                        <!-- Conteúdo da célula -->
                                      </td>
                                      <td class="valor-unitario">R$ <?php echo $row['valor_atual']; ?></td>
                                      <!-- Restante do código para as outras colunas -->
                                  </tr>
                            <?php
                                }
                              } catch (PDOException $e) {
                                  echo "Erro na execução da consulta: " . $e->getMessage();
                              }
                            ?>
                    </section>
              </div>
              <div class="col-12 col-sm-3">
                  <aside>
                      <!--Div com as informacoes da compra-->
                      <div class="inf">
                          <div class="inf-title justify-content-around">Informações da Compra</div>
                          <div ><span>Sub-total</span><span id="subtotal-compra">R$438</span></div>
                          <div><span>Frete</span><span>R$20,00</span></div>
                          <div>
                              <!--Botao que adiciona o cupom de desconto-->
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
                      <!--Botao para encerrar a compra-->
                      <button class="btn-finalizar">Finalizar Compra</button>
                  </aside>
            </div>
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
