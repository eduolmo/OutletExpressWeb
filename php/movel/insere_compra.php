<?php
 
/*
 * O seguinte codigo abre uma conexao com o BD e adiciona uma compra nele.
 * As informacoes de um produto sao recebidas atraves de uma requisicao POST.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
	
	// Primeiro, verifica-se se todos os parametros foram enviados pelo cliente.
	if (isset($_POST['forma_pagamento']) && isset($_POST['data'])  && isset($_POST['FK_CLIENTE_codigo'])) {
		
		// Aqui sao obtidos os parametros
		$forma_pagamento = $_POST['forma_pagamento'];
		$data = $_POST['data'];
        $FK_CLIENTE_codigo = $_POST['FK_CLIENTE_codigo'];		

		// A proxima linha insere uma nova compra no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO COMPRA(forma_pagamento, data, FK_CLIENTE_codigo) VALUES('$forma_pagamento', '$data', '$FK_CLIENTE_codigo')");
		if ($consulta->execute()) {
			// Se o produto foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1
			$resposta["sucesso"] = 1;
		} else {
			// Se o produto nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar produto no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido nao preenchido";
	}
}
else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["erro"] = "usuario ou senha não confere";
}

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>