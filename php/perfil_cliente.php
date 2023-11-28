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

  <!-- php de alterar senha -->
  <?php     
      error_reporting(0);
      session_start();      

      if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar_alteracoes'])){  

        $senha_atual = trim(filter_input(INPUT_POST,'senha_atual',FILTER_SANITIZE_SPECIAL_CHARS));
        $nova_senha = trim(filter_input(INPUT_POST,'nova_senha',FILTER_SANITIZE_SPECIAL_CHARS));
        $confirmar_senha = trim(filter_input(INPUT_POST,'confirmar_senha',FILTER_SANITIZE_SPECIAL_CHARS));

        require_once 'cliente.php';
        //$cliente = new Cliente();

        $email = $_SESSION['cliente']['email'];
        /*
        //consuta um usuario no bd pelo email
        $sql = "SELECT * FROM usuario WHERE email = :email";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();*/
        $senha_db = $_SESSION['cliente']['senha'];
        //echo $senha_db;

        $senha_decode = base64_decode($senha_db);
        //echo $senha_decode;
        
        if ($senha_decode === $senha_atual){
          //echo "Senha válida";
          $codigo_cliente = $_SESSION['cliente']['codigo'];

          if($nova_senha === $corfirmar_senha){

            $nova_senha_db = base64_encode($nova_senha);          

            $sql="UPDATE usuario SET senha = :nova_senha WHERE codigo = :codigo";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':nova_senha', $nova_senha_db);
            $stmt->bindParam(':codigo', $codigo_cliente, PDO::PARAM_INT);
            $stmt->execute();	
          }
          else{
            echo '<script>alert("Senha não confirmada")</script>';
          }

          //$nova_senha_decode = base64_decode($nova_senha_db);
          //echo $nova_senha_decode;

          /*
          $cliente->update($codigo_cliente);
          echo 'update';*/
          
          

        } 
        else{
          echo '<script>alert("Senha atual incorreta")</script>';
        }

      }

      if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alterar_nome'])){  

        $novo_nome = trim(filter_input(INPUT_POST,'novo_nome',FILTER_SANITIZE_SPECIAL_CHARS));
        $senha_atual = trim(filter_input(INPUT_POST,'nova_senha',FILTER_SANITIZE_SPECIAL_CHARS));


      }

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
                $nome_cliente = $_SESSION['cliente']['nome'];

                echo "<p class='nome'>".$nome_cliente."</p>";
              ?>
            </div>

            <div class="d-flex">
              <p class="text-md subtitulo"><strong>Email:</strong></p>
              <?php
                $email_cliente = $_SESSION['cliente']['email'];

                echo "<p class='nome'>".$email_cliente."</p>";
              ?>
            </div>

          </div>

          <div class="flex-column">
            <button class="button mt-3" id="abrir_modal">Alterar senha</button>
            <button class="button mt-3" id="abrir_modal_nome">Alterar nome</button>
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
          

          <!--formulario de alterar senha-->
          <form id="form_alterar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
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
                  </div>

                  <div class="botoes">
                    <input id="entrar" type="submit" onclick="" name="enviar_alteracoes" class="btn-lg but" value="Alterar">
                    <button id="fechar_modal" class="mt-3" onclick="window.location.href='perfil_cliente.php'">Fechar</button>
                  </div>

              </div> 
            </div>            
          </form>
        
          
          <!--formulario de alterar nome-->
          <form id="form_alterar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div id="modal2" class="hide2">
              <div class="modal-cabecalho">
                <div class="fechar" onclick="window.location.href='perfil_cliente.php'"></div>
                  <h2 class="modal-titulo">Alterar nome</h2>

                  <div class="p-2 mb-3">
                    <input required class="form-control mx-auto txtinput" type="text" name="novo_nome" id="nome" placeholder="Nova nome">
                  </div>

                  <div class="p-2 mb-3">
                    <input required class="form-control mx-auto txtinput" type="password" name="senha_atual" id="email" placeholder="Senha atual">
                  </div>
                  
                  <div class="botoes">
                    <input id="entrar" type="submit" onclick="" name="alterar_nome" class="btn-lg but" value="Alterar">
                    <button id="fechar_modal" class="mt-3" onclick="window.location.href='perfil_cliente.php'">Fechar</button>
                  </div>

              </div> 
            </div>            
          </form>

          

      </section>
    </div>
  </div>
</body>
</html>
