<?php
//session_set_cookie_params(['httponly' => true]);
session_start();
include_once 'banco_conexao.php';

/*
quando uma categoria do cabecalho for selecionada
ira entrar no IF, e salvar a categoria selecionada na SESSION
e depois redirecionar o cliente para a tela de produtos
*/
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoria_produto'])){
    $_SESSION['categoria_produto'] = $_POST['categoria_produto'];

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'produtos.php';
    header("Location: http://$host$uri/$extra");
}

?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- começo do cabecalho -->
<header class="cabecalho">
    <div class="cabecalho_pesquisa">
        <div class="row">
            <!-- div que contem a logo do site -->
            <div class="col-5 col-md-2 col-xxl-3 me-xxl-2 logo">
                <a href="index.php">
                    <img src="../imagens/logo1.png" alt="logo do site">
                    <h1 class="logo_titulo">OutLet Express</h1>
                </a>
            </div>
            <!-- div que tem a barra de pesquisa -->
            <div class="col-7 col-md-8 ms-md-5 col-lg-5 pt-lg-3 col-xxl-5 ms-xxl-0  busca">
                <!--<img class="lupa" src="../icones/lupa.png" alt="">-->
                <input type="text" class="pesquisa" placeholder="   Buscar">
            </div>
            <!-- div que tem os botoes para o carrinho e para entrar -->
            <div class="col-12 col-md-4 pt-md-5 pt-lg-3 col-xxl-3 botoes">
                <button class="botao">DOWNLOAD APP</button>
                <div class="carrinho">
                    <a href="
                        <?php 
                            /*
                            se o cliente estiver salvo na SESSION, 
                            o link sera definido para a carrinho,
                            caso contrario para a tela de login
                            */
                            if(isset($_SESSION['cliente'])){
                                echo 'carrinho.php';
                            }
                            else{
                                echo 'login2.php';
                            }
                        ?>
                        ">
                        <img class="carrinho_img" src="../icones/bolsa-de-compras.png" alt="">
                        <p class="botoes_nome">CARRINHO</p>
                    </a>
                </div>
                <div class="entrar">
                    <a href="
                    <?php 
                        /*
                        se o cliente estiver salvo na SESSION, 
                        o link sera definido para a perfil do cliente,
                        caso contrario para a tela de login
                        */
                        if(isset($_SESSION['cliente'])){
                            echo 'perfil_cliente.php';
                        }
                        else{
                            echo 'login2.php';
                        }
                    ?>
                    ">
                    <img class="entrar_img" src="../icones/pessoas.png" alt="">
                    <?php                            
                        if(isset($_SESSION['cliente'])){ 
                            echo "<p class='botoes_nome'>".$_SESSION['cliente']['nome']."</p>";
                        }
                        else{
                            echo "<p class='botoes_nome'>ENTRAR</p>";
                        }
                    ?>   
                    </a>                 
                </div>
            </div>
        </div>
    </div>
    
    <!-- fim do cabecalho roxo --> 

    <!-- inicio da cabecalho rosa -->
    <div class="cabecalho_rosa">
        <nav class="navbar navbar-expand-lg cabecalho_menu">
            <div class="container-fluid col-lg-1">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>    

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item pe-lg-5 col-xl-2 pe-xxl-5">
                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="categoria_produto" value="Recomendado" display="hidden">
                            <input type="submit" name="procura_categoria" class="btn-lg but procura_categoria" value="RECOMENDADO">
                        </form>
                    </li>
                    
                    <li class="nav-item pe-lg-5 ps-xl-1 pe-xxl-5">
                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="categoria_produto" value="Roupa" display="hidden">
                            <input type="submit" name="procura_categoria" class="btn-lg but procura_categoria" value="ROUPA">
                        </form>
                    </li>
                    <li class="nav-item pe-lg-5 ps-xl-5 pe-xxl-5">
                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="categoria_produto" value="Calçado" display="hidden">
                            <input type="submit" name="procura_categoria" class="btn-lg but procura_categoria" value="CALÇADO">
                        </form>
                    </li>
                    <li class="nav-item pe-lg-5 ps-xl-5 pe-xxl-5">
                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="categoria_produto" value="Eletrodoméstico" display="hidden">
                            <input type="submit" name="procura_categoria" class="btn-lg but procura_categoria" value="ELETRODOMÉSTICO">
                        </form>
                    </li>
                    <li class="nav-item pe-lg-5  ps-xl-5">
                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="categoria_produto" value="Eletrônico" display="hidden">
                            <input type="submit" name="procura_categoria" class="btn-lg but procura_categoria" value="ELETRÔNICO">
                        </form>
                    </li>
                    <li class="nav-item pe-lg-5 ps-xl-5">
                        <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <input type="hidden" name="categoria_produto" value="Móvel" display="hidden">
                            <input type="submit" name="procura_categoria" class="btn-lg but procura_categoria" value="MÓVEL">
                        </form>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
  
    <!-- fim do cabecalho rosa --> 
</header>
