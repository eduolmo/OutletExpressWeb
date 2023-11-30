<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="../css/perfil_cliente.css" />
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

  <!-- php de alterar senha -->
  <?php     
    error_reporting(0);
    session_start();    
    
    require_once 'cliente.php';

    $codigo_cliente = $_SESSION['cliente']['codigo'];
    $email = $_SESSION['cliente']['email'];
    $senha_db = $_SESSION['cliente']['senha'];
    $senha_decode = base64_decode($senha_db);
    //echo $senha_decode;

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar_alteracoes'])){  

      $senha_atual = trim(filter_input(INPUT_POST,'senha_atual',FILTER_SANITIZE_SPECIAL_CHARS));
      $nova_senha = trim(filter_input(INPUT_POST,'nova_senha',FILTER_SANITIZE_SPECIAL_CHARS));
      $confirmar_senha = trim(filter_input(INPUT_POST,'confirmar_senha',FILTER_SANITIZE_SPECIAL_CHARS));
       
      
      if ($senha_decode === $senha_atual){
        //echo "Senha válida";          
        
        if($nova_senha === $confirmar_senha){

          $nova_senha_db = base64_encode($nova_senha);          
          //$campo_bd = "senha";

          
          $sql="UPDATE usuario SET senha = :nova_senha WHERE codigo = :codigo";
          $stmt = Database::prepare($sql);
          $stmt->bindParam(':nova_senha', $nova_senha_db);
          $stmt->bindParam(':codigo', $codigo_cliente, PDO::PARAM_INT);
          $stmt->execute();	
          
          //$executa = CRUD::update($codigo_cliente, $campo_bd, $nova_senha_db);
          
        }
        else{
          echo '<script>alert("Senha não confirmada")</script>';
        }

             
        
      } 
      else{
        echo '<script>alert("Senha atual incorreta")</script>';
      }

    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['alterar_nome'])){  

      $novo_nome = trim(filter_input(INPUT_POST,'novo_nome',FILTER_SANITIZE_SPECIAL_CHARS));
      $sql="UPDATE usuario SET nome = :novo_nome WHERE codigo = :codigo";
      $stmt = Database::prepare($sql);
      $stmt->bindParam(':novo_nome', $novo_nome);
      $stmt->bindParam(':codigo', $codigo_cliente, PDO::PARAM_INT);
      $stmt->execute();	

    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_conta'])){ 

      $senha_atual = trim(filter_input(INPUT_POST,'senha_atual',FILTER_SANITIZE_SPECIAL_CHARS));
      $confirmar_senha = trim(filter_input(INPUT_POST,'confirmar_senha',FILTER_SANITIZE_SPECIAL_CHARS));
      $apagar = " ";
      if($senha_atual === $confirmar_senha){
        $sql="UPDATE usuario SET nome = :novo_nome WHERE codigo = :codigo";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':novo_nome', $apagar);
        $stmt->bindParam(':codigo', $codigo_cliente, PDO::PARAM_INT);
        $stmt->execute();
        
        $sql="UPDATE usuario SET email = :novo_nome WHERE codigo = :codigo";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':novo_nome', $apagar);
        $stmt->bindParam(':codigo', $codigo_cliente, PDO::PARAM_INT);
        $stmt->execute();

        $sql="UPDATE usuario SET senha = :novo_nome WHERE codigo = :codigo";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(':novo_nome', $apagar);
        $stmt->bindParam(':codigo', $codigo_cliente, PDO::PARAM_INT);
        $stmt->execute();
      }
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
            <button class="button mt-3 ms-sm-2 ms-0 me-sm-2 me-0" id="abrir_modal_senha">Alterar senha</button>
            <button class="button mt-3 ms-sm-2 ms-0 me-sm-2 me-0" id="abrir_modal_nome">Alterar nome</button>
            <button class="button mt-3 ms-sm-2 ms-0 me-sm-2 me-0" id="abrir_modal_sair">Excluir conta</button>
            <button class="button2 mt-3 ms-sm-2 ms-0 me-sm-2 me-0">Sair da conta</button>
          </div>
   
        </div>


      <div class="linhas mt-3"></div>

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

          
  </div>
          

          <!--formulario de alterar senha-->
          <form id="form_alterar1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div id="fade_senha" class="hide_senha"></div>
            <div id="modal_senha" class="hide_senha">
              <div class="modal-cabecalho_senha">
                 <div id="fechar_modal_senha" onclick="window.location.href='perfil_cliente.php'"></div>
                  <h2 class="modal-titulo_senha">Alterar senha</h2>

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
                    <input id="entrar_senha" class="button" type="submit" onclick="" name="enviar_alteracoes" class="btn-lg but" value="Alterar">
                  </div>

              </div> 
            </div>            
          </form>
        
          
          <!--formulario de alterar nome-->
          <form id="form_alterar2" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div id="fade_nome" class="hide_nome"></div>
            <div id="modal_nome" class="hide_nome">
              <div class="modal-cabecalho_nome">
              <div id="fechar_modal_nome" onclick="window.location.href='perfil_cliente.php'"></div>
                  <h2 class="modal-titulo_nome">Alterar nome</h2>

                  <div class="p-2 mb-3">
                    <input required class="form-control mx-auto txtinput" type="text" name="novo_nome" id="nome" placeholder="Novo nome">
                  </div>
                  
                  <div class="botoes">
                    <input id="entrar_nome" class="button" type="submit" onclick="" name="alterar_nome" class="btn-lg but" value="Alterar">
                  </div>

              </div> 
            </div>            
          </form>

          <!--formulario de excluir conta-->
          <form id="form_alterar3" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div id="fade_sair" class="hide_sair"></div>
            <div id="modal_sair" class="hide_sair">
              <div class="modal-cabecalho_sair">
                <div id="fechar_modal_sair" onclick="window.location.href='perfil_cliente.php'"></div>
                  <h2 class="modal-titulo_sair">Excluir conta</h2>

                  <div class="p-2 mb-3">
                    <input required class="form-control mx-auto txtinput" type="password" name="senha_atual" id="nome" placeholder="Digite sua senha">
                  </div>

                  <div class="p-2 mb-3">
                    <input required class="form-control m x-auto txtinput" type="password" name="confirmar_senha" id="senha_exclui" placeholder="Confirmar senha">
                  </div>
                  
                  <div class="botoes">
                    <input id="entrar_sair" type="submit" onclick="" name="excluir_conta" class="btn-lg but button" value="Excluir">
                  </div>

              </div> 
            </div>            
          </form>

      </section>
    </div>
  </div>
  <script src="../js/modal_senha.js" defer></script>
  <script src="../js/modal_nome.js" defer></script>
  <script src="../js/modal_sair.js" defer></script>
</body>
</html>
