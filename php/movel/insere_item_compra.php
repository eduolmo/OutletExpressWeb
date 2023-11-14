<?php
 
/*
 * O seguinte codigo abre uma conexao com o BD e adiciona os dados do item_compra nele.
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
	if (isset($_POST['valor_item']) && isset($_POST['quantidade'])  && isset($_POST['FK_COMPRA_codigo']) && isset($_POST['FK_PRODUTO_codigo'])) {
		
		// Aqui sao obtidos os parametros
		$valor_item = $_POST['valor_item'];
		$quantidade = $_POST['quantidade'];
        $FK_COMPRA_codigo = $_POST['FK_COMPRA_codigo'];
        $FK_PRODUTO_codigo = $_POST['FK_PRODUTO_codigo'];		

		// A proxima linha insere uma nova compra no BD.
		// A variavel consulta indica se a insercao foi feita corretamente ou nao.
		$consulta = $db_con->prepare("INSERT INTO Item_compra(valor_item, quantidade, FK_COMPRA_codigo, FK_PRODUTO_codigo) VALUES('$valor_item', '$quantidade', '$FK_COMPRA_codigo', '$FK_PRODUTO_codigo')");
		if ($consulta->execute()) {
			// Se o produto foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 1
			$resposta["sucesso"] = 1;
		} else {
			// Se o produto nao foi inserido corretamente no servidor, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar item no BD: " . $consulta->error;
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