<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="../css/perfl_cliente.css" />
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

  <?php
  include 'cabecalho2.php';
   ?>	
    <div class="container mt-3" id="inicio">
        <div class="row">
            <div class="principal">
                <img class="img-fluid pessoa m-2" src="../imagens/pessoas.jpg">
                <div>
                  <h1 class="col-md-6" id="titulo">Seu Perfil!</h1>
                  <p class="text-md" id="titulo2">Encontre todas as sua informações aqui!</p>
                  <a id="sair" href="">Sair da conta</a>
                  
                </div>
                
            </div>
            <div class="pedidos">
                <p class=" d-flex justify-content-center" id="compras">Meus Produtos Comprados</p>

                 <tr class="produto-item ">
                              <td>
                                <div class="produto border">
                                  <img class="produto-img " src="../imagens/patins.png" alt="">
                                  <div class="inf">
                                    <div class="nome text-sm">Patins Inline Roller</div>
                                    <div class="categoria">Calçados</div>
                                  </div>
                                </div>
                              </td>
                  </tr>

                  <tr class="produto-item">
                    <td>
                      <div class="produto border">
                        <img class="produto-img " src="../imagens/maquina.jpg" alt="">
                        <div class="inf">
                          <div class="nome text-sm">Lavadora de Roupas Midea</div>
                          <div class="categoria">Eletrodomésticos</div>
                        </div>
                      </div>
                    </td>
        </tr>
                
            </div>
        </div>
    </div>
</section>
</body>
</html>
