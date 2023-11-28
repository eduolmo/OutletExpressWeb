<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="../css/perfil_cliente.css" />
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <script src="../js/pedido_modal.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

  <?php
  include 'cabecalho2.php';
   ?>	
  <div class="container mt-5">
    <div class="row">
      <section class="shadow p-3 mb-5 bg-body rounded ">
        <div class="informacoes d-flex flex-md-row flex-column">

          <div class="col-md-6">
            <h1 class="perfil">Meu Perfil!</h1>
            <p class="text-md subtitulo">Encontre todas as sua informações aqui!</p>

            <div class="d-flex">
              <p class="text-md subtitulo"><strong>Nome:</strong></p>
              <?php
                //require_once 'cliente.php';
                $nome_cliente = 'Julia';

                echo "<p class='nome'>".$nome_cliente."</p>";
              ?>
            </div>

            <div class="d-flex">
              <p class="text-md subtitulo"><strong>Email:</strong></p>
              <?php
                $email_cliente = 'julia@gmail.com';

                echo "<p class='nome'>".$email_cliente."</p>";
              ?>
            </div>

          </div>

          <div class="flex-column">
            <button class="button mt-3" id="abrir_modal">Alterar senha</button>
            <button class="button mt-3">Sair da conta</button>
          </div>          
        </div>


      <div class="linhas"></div>

      <div class="pedidos">
        <p class=" d-flex justify-content-center" id="compras">Meus Produtos Comprados</p>

          <tr class="produto-item">
            <td>
              <div class="produto mb-3">
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
              <div class="produto">
                <img class="produto-img " src="../imagens/patins.png" alt="">
                <div class="inf">
                  <div class="nome text-sm">Patins Inline Roller</div>
                  <div class="categoria">Calçados</div>
                </div>
              </div>
            </td>
          </tr>
        
        </div>
          <!--Botao para encerrar a compra-->
          <div id="fade" class="hide"></div>
          <div id="modal" class="hide">
            <div class="modal-cabecalho">
              <div class="fechar" onclick="window.location.href='perfil_cliente.php'"></div>
                <h2 class="modal-titulo">Alterar senha</h2>

                <div class="p-2 mb-3">
                  <input required class="form-control mx-auto txtinput" type="password" name="senha_atual" id="email" placeholder="Senha atual">
                </div>

                <div class="p-2 mb-3">
                  <input required class="form-control mx-auto txtinput" type="password" name="nova_senha" id="nome" placeholder="Nova senha">
                </div>

                <div class="p-2 mb-3">
                  <input required class="form-control m x-auto txtinput" type="password" name="confirmar_senha" id="senha" placeholder="Confirmar nova senha">
  
                <div class="botoes">
                  <input id="entrar" type="submit" onclick="" name="enviar_alteracoes" class="btn-lg but" value="Alterar">
                  <button id="fechar_modal" class="mt-3" onclick="window.location.href='perfil_cliente.php'">Fechar</button>
                </div>
                
              </div>
          </div>

      </section>
    </div>
  </div>
</body>
</html>