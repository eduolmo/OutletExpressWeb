<!doctype html>
<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
		<link rel="shortcut icon" href="../imagens/logo2.png" type="image/x-icon">
		
		<title>Outlet Express</title>
		
		<!-- Bootstrap CSS v5.2.1 -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
		
		<link rel="stylesheet" href="../css/index.css">
		<link rel="stylesheet" href="../css/cabecalho2.css">
	</head>

	<body>
		<!-- cabecalho -->
		<?php
			include 'cabecalho2.php';
		?>	
				

		
		<!-- A classe carousel slide - Container todos os elementos referentes ao carousel-->
		<!-- adicional a classe carousel-fade - alterar o efeito de transição dos slides-->
		<div class="carousel slide" data-bs-interval="5000" data-bs-ride="carousel" id="meuCarousel">
			<!-- A classe carousel-inner - Container para todos os SLIDES-->
			<div class="carousel-inner">

				<!-- A classe carousel-item - Contém CADA slides individual-->
				<!--adicone o atributo data-bs-interval="3000" para mudar o tempo individual de cada slide 3000 milesegundos= 3segundos-->
				<!-- d-block mostra o elemento em bloco-->
				<div class="carousel-item active">
					<img src="../imagens/eletrodomesticos.jpg" class="w-100" alt="">
					
					<!-- caption responsivo dentro do slide-->
					<div class="carousel-caption">
						<h3 class="topico">O QUE É OUTLET ?</h3>
						<p class="paragrafo">
							Outlet é um termo que se refere a produtos que tem um
							grande desconto por conta de serem sobra de estoque, 
							coleções passadas ou conterem pequenas avarias.
						</p>
					</div>
				</div>

				<!--adicone o atributo data-bs-interval="3000" para mudar o tempo individual de cada slide 1000 milesegundos= 1segundo-->
				<div class="carousel-item" >
					<img src="../imagens/vestuario.png" class="w-100" alt="">
					
					<div class="carousel-caption">
						<h3 class="topico">PRECISANDO ECONOMIZAR ?</h3>
						<p class="paragrafo">
							O Outlet Express é o site perfeito para quem deseja economizar. 
							Aqui você irá encontrar produtos com preços imperdíveis!
						</p>
					</div>
				</div>


				<div class="carousel-item">
					<img src="../imagens/tecnologia.jpg" class="w-100" alt="">

					<div class="carousel-caption">
						<h3 class="topico">RÁPIDO E FÁCIL !</h3>
						<p class="paragrafo">
							Aqui no Outlet Express você encontrará 
							tudo que precisa de forma rápida e fácil.
							Você encontrará roupas, celular, computador, 
							eletrodoméstico, etc.
						</p>
					</div>
				</div>
			</div>

			<!-- o atributo data-bs-target precisa estar vinculado ao id do objeto carrousel -->
			<!-- botão anterior-->
			<button class="carousel-control-prev" data-bs-target="#meuCarousel" data-bs-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</button>

			<!-- botão próximo-->
			<button class="carousel-control-next" data-bs-target="#meuCarousel" data-bs-slide="next">
				<span class="carousel-control-next-icon"></span>
			</button>
			

			<!-- indicadores-->
			<div class="carousel-indicators">
				<button class="active" data-bs-target="#meuCarousel" data-bs-slide-to="0"></button>
				<button class="" data-bs-target="#meuCarousel" data-bs-slide-to="1"></button>
				<button class="" data-bs-target="#meuCarousel" data-bs-slide-to="2"></button>
			</div>

		</div>



		<!-- comeco da secao com informacoes rapidas sobre o site -->
		<section id="info">
			<div class="divisor">
				<div class="icone"> <img class="img-fluid" src="../icones/caixa.png" alt="icone de caixa"> </div>
				<p>Produtos que só se encontram AQUI!</p>
			</div>
			<div class="divisor">
				<div class="icone"> <img class="img-fluid" src="../icones/caminhao.png" alt="icone de caminhao"> </div>
				<p>Entrega Rápida</p>
			</div>
			<div class="divisor">
				<div class="icone"> <img class="img-fluid" src="../icones/pagamento.png" alt="icone de dinheiro"> </div>
				<p>Pagamento Seguro</p>
			</div>
		</section>
		<!-- fim da secao com informacoes rapidas -->

		<!-- comeco da secao que apresenta tipos de produtos que podem ser encontrados no nosso site -->
		<section id="produtos">
			<h2 class="row justify-content-center p-4">O QUE VOCÊ IRÁ ENCONTRAR?</h2>
			<br>
			<div class="row justify-content-around">
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/bolsa.jpg" alt="foto de bolsa">
					<p class="row justify-content-center">Bolsas e Acessórios</p>
				</div>
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/camera.jpg" alt="foto de camera">
					<p class="row justify-content-center">Tecnologias</p>
				</div>
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/poltrona.jpg" alt="foto de poltrona">
					<p class="row justify-content-center">Produtos para Casa</p>
				</div>
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/relogio.jpg" alt="foto de relógio digital">
					<p class="row justify-content-center">Eletrônicos</p>
				</div>
			</div>
		</section>
		<!-- fim da secao que apresenta os produtos do site -->

		<!-- comeco da secao com os produtos favoritos e com as empresas parceiras -->
		<section id="favoritos">
			<h2 class="row justify-content-center">Produtos favoritos dos nossos clientes</h2>
			<br>
			<div class="row justify-content-around">
				<div class="produtos col-6 col-md-3 d-flex align-items-center row justify-content-center">
					<img class="img-fluid" src="../imagens/casaco-jeans.jpg" alt="foto de casaco jeans">
					<p class="row justify-content-center">Casacos</p>
				</div>
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/notebook.jpg" alt="foto de notebook">
					<p class="row justify-content-center">Notebook</p>
				</div>
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/moletom.jpg" alt="foto de blusa de moletom">
					<p class="row justify-content-center">Moletom</p>
				</div>
				<div class="produtos col-6 col-md-3 row justify-content-center">
					<img class="img-fluid" src="../imagens/vestido.jpg" alt="foto de vestido">
					<p class="row justify-content-center">Vestidos</p>
				</div>
			</div>
			<!-- fim da parte que apresenta os produtos favoritos -->

			<!-- comeco da parte que mostra as empresas parceiras do site -->
			<br>
			<h2 class="row justify-content-center">Empresas parceiras</h2>
			<div id="empresas" class="row justify-content-around">
				<div class="empresa col-6 col-md-3">
					<img class="img-fluid" src="../imagens/adidas.jpg" alt="logo da adidas">
					<p class="row justify-content-center">Adidas</p>
				</div>
				<div class="empresa col-6 col-md-3">
					<img class="img-fluid" src="../imagens/tramontina.png" alt="logoda tramontina">
					<p>Tramontina</p>
				</div>
				<div class="empresa col-6 col-md-3">
					<img class="img-fluid" src="../imagens/motorola.png" alt="logo da motorola">
					<p>Motorola</p>
				</div>
				<div class="empresa col-6 col-md-3">
					<img class="img-fluid" src="../imagens/nike.jpg" alt="logo da nike">
					<p>Nike</p>
				</div>
			</div>
			<br>
			<!-- fim da parte com as empresas parceiras -->
		</section>
		<!-- fim da secao dos produtos favoritos e das empresas parceiras -->

		<!-- comeco do rodape -->
		<footer>
			
		</footer>
		<!-- fim do rodape -->



		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
			integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
		</script>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
			integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
		</script>
	</body>
</html>
