<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Outlet Express - Login</title>
    <script src="../js/autenticar.js" defer></script>
    <link rel="stylesheet" href="../css/cabecalho2.css">
    <link rel="stylesheet" href="../css/login2.css">
    <link rel="icon" type="image/png" href="img/logo2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
    <!-- cabecalho -->
    <?php
      //session_start();

      if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        
        $email = trim(filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL));
        $senha = trim(filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS));

        require_once 'cliente.php';
        //require_once 'banco_conexao.php';

        $cliente = new Cliente();
        //consulta um usuario pelo email
        if($cliente->consulta_usuario($email)){
          //echo 'Existe usuario no BD';

          //consuta um usuario no bd pelo email
          $sql = "SELECT * FROM usuario WHERE email = :email";
          $stmt = Database::prepare($sql);
          $stmt->bindParam(':email', $email);
          $stmt->execute();
          $lista_cliente = $stmt->fetch(PDO::FETCH_BOTH);
          //print_r($lista_cliente);
          $senha_db = $lista_cliente['senha'];
          
          $senha_decode = base64_decode($senha_db);
          //echo $senha_decode;

          if ($senha_decode === $senha){
            //echo "Senha válida";

            //guarda dados do cliente na sessao
            $_SESSION['cliente'] = $lista_cliente;

            //echo var_dump($_SESSION['resultado']);
            
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
            
          }
          else{
            echo "Senha inválida";
          }
        } 
        else{
          echo 'Usuario não existe, cadastre-se';
        } 
      }          
      
        
      
      //include 'banco_conexao.php';
      //include 'cadastro2.php';
/*
      $db = Database::getInstance();
      $sql = "SELECT email FROM USUARIO WHERE email='$email'";
      $consulta_usuario_existe = Database::prepare($sql);
      $consulta_usuario_existe->execute();

      if ($consulta_usuario_existe->rowCount() > 0) { 
        $senha_db = $db->prepare("SELECT senha FROM USUARIO WHERE email='$email'");
        $senha_decode = base64_decode($senha_db);

        if ($senha_decode === $senha):
          echo "Senha válida";
          
          $_SESSION['email'] = $email;
          echo 'session ';
        else:
          echo "Senha inválida";
        endif;

        
      }
      else{
        echo '<script>alert("ERRO: Usuario não existe!")</script>';
      }

     */
      include 'cabecalho2.php';
    ?>	

     <!-- Iniciando o formulário de login -->
    <div class="container p-5 text-center my-2 border col-md-12 col-lg-4">
      <form id="formEntrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="p-2 mb-3">
          <img class="img-fluid" src="../imagens/logo2.png">
        </div>
        <div class="p-2 mb-3">
          <h2 class="text-md titulo">Bem Vindo de volta ao OutLet Express!</h2>
        </div>
        <div class="p-2 mb-3">
          <input required class="form-control mx-auto txtinput" type="email" name="email" id="email" placeholder="Digite seu Email">
        </div>

  
        <div class="p-2 mb-3">
          <input required class="form-control mx-auto txtinput" type="password" name="senha" id="senha" placeholder="Senha">
        </div>

        <p id="aviso"><img src="../icones/aviso.png" alt="icone de aviso"> Confira se os campos estão preenchidos corretamente ! <img src="../icones/aviso.png" alt="icone de aviso"></p>

        <input id="entrar" type="submit" onclick="" name="entrar" class="btn-lg but" value="ENTRAR">

        <div class="p-2 mb-3">
          <a href="cadastro2.php" class="d-block link">Ainda não tem conta?</a>
        </div>
        
      </form>       

    </div>
   
    <?php
		  include 'rodape.php';
	  ?>

  </body>
</html>
