<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OutLet Express - Cadastro</title>
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/cadastro2.css">
    <link rel="icon" type="image/png" href="img/logo2.png">
    <script src="../js/cadastro.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- cabecalho -->
      <?php
        error_reporting(0);
        session_start();
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){

          //validacao e sanitizacao dos campos do form
          $email = trim(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL));
          $nome = trim(filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS));
          $senha = trim(filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS));
          $senha2 = trim(filter_input(INPUT_POST,'senha2',FILTER_SANITIZE_SPECIAL_CHARS));
          
          if(!$email){
            echo '<script>alert("Confira se os campos estão preenchidos corretamente!")</script>';
          }
          elseif($senha === $senha2){        

            $consulta_usuario_existe = $db_con->prepare("SELECT email FROM USUARIO WHERE email='$email'");
            $consulta_usuario_existe->execute();
            if ($consulta_usuario_existe->rowCount() > 0) { 
              echo '<script>alert("ERRO: Usuario já cadastrado!")</script>';
            }
            else{
              $_SESSION['email'] = $email;
              
              //CRIPTOGRAFIA DA SENHA
              $senhaSegura = password_hash($senha, PASSWORD_DEFAULT);

              //CRIAR CLIENTE
              include_once 'usuario.php';

              
              //instancia o cliente
              $usuario = new Usuario();	
              
              //informa os dados do cliente
              $usuario->setNome($nome);
              $usuario->setEmail($email);
              
              //insere o cliente
              if($usuario->insert()):
                $_SESSION['mensagem'] = "Cadastro com sucesso!";
                echo "Cadastrou!";
                //header('Location: 30_consultar.php?sucesso');
              else:
                $_SESSION['mensagem'] = "Erro ao cadastrar!";	
                echo "Não cadastrou!";	
                //header('Location: 30_consultar?erro');
              endif;
              



              /* CODIGO PARA LOGIN
              $senha_db = $db_con->prepare("SELECT senha FROM USUARIO WHERE email='$email'");
              if (password_verify($senha,$senha_db)):
                echo "Senha válida";
              else:
                echo "Senha inválida";
              endif;*/


           
              $host  = $_SERVER['HTTP_HOST'];
              $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
              $extra = 'index.php';
              header("Location: http://$host$uri/$extra");
            }            
            
          }
          else{
            echo '<script>alert("Confira sua senha!")</script>';
          }
        }

        include 'cabecalho2.php';
        
    ?>	

    <!-- Iniciando o formulário de cadastro -->
    <div class="container p-5 text-center my-2 border col-md-12 col-lg-4">
      <form id="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="p-2 mb-3">
          <img class="img-fluid" src="../imagens/logo2.png">
        </div>
        <div class="p-2 mb-3">
          <h2 class="text-md titulo">Bem Vindo ao OutLet Express!</h2>
        </div>
        <div class="p-2 mb-3">
          <input required class="form-control mx-auto txtinput" type="text" name="email" id="email" placeholder="Digite seu Email">
        </div>

        <div class="p-2 mb-3">
          <input required class="form-control mx-auto txtinput" type="text" name="nome" id="nome" placeholder="Digite seu Nome">
        </div>
        <div class="p-2 mb-3">
          <input required class="form-control m x-auto txtinput" type="password" name="senha" id="senha" placeholder="Senha">
          <!--<p id="avisoSenha" class="text-md">a</p>-->
        </div>
        <div class="p-2 mb-3">
          <input required class="form-control mx-auto txtinput" type="password" name="senha2" id="senha2" placeholder="Confirmar Senha">
        </div>
        <!--
        <p id="aviso"><img src="../icones/aviso.png" alt="icone de aviso"> Confira se os campos estão preenchidos corretamente ! <img src="../icones/aviso.png" alt="icone de aviso"></p>
        -->

        <input id="entrar" type="submit" onclick="" name="
        " class="btn-lg but" value="ENVIAR">

        <div class="p-2 mb-3">
          <a href="login2.php" class="d-block link">Já tem conta?</a>
        </div>

      </form> 

    </div>
    <!---Fim do formulário de cadastro-->

    <?php
		  include 'rodape.php';
	  ?>

  </body>
</html>
