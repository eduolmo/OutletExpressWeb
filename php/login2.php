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
        include 'cabecalho2.php';
    ?>	

     <!-- Iniciando o formulário de login -->
     <div class="container p-5 text-center my-2 border col-md-12 col-lg-4">
      <form>
        <div class="p-2 mb-3">
          <img class="img-fluid" src="../imagens/logo2.png">
        </div>
        <div class="p-2 mb-3">
            <h2 class="text-md titulo">Bem Vindo de volta ao OutLet Express!</h2>
        </div>
        <div class="p-2 mb-3">
            <input class="form-control mx-auto txtinput" type="email" name="email" id="email" placeholder="Digite seu Email">
        </div>

  
        <div class="p-2 mb-3">
            <input class="form-control mx-auto txtinput" type="password" name="senha" id="senha" placeholder="Senha">
        </div>

        
      </form>

        <p id="aviso"><img src="../icones/aviso.png" alt="icone de aviso"> Confira se os campos estão preenchidos corretamente ! <img src="../icones/aviso.png" alt="icone de aviso"></p>

        <button id="entrar" type="" class="btn-lg but">ENTRAR</button>

        <div class="p-2 mb-3">
            <a href="cadastro2.php" class="d-block link">Ainda não tem conta?</a>
        </div>


      </div>
   


  </body>
</html>