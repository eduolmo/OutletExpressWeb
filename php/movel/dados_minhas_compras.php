<?php
 
/*
 * O codigo seguinte retorna a quantidade e o nome do produto comprado
 * Essa e uma requisicao do tipo GET. Uma empresa e identificada
 * pelo campo codigo.
 */

// conexão com bd
require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();

// verifica se o usuário conseguiu autenticar
if(autenticar($db_con)) {
 
	// Verifica se o parametro id foi enviado na requisicao
	if (isset($_GET["email"])) {
		$email = $_GET['email'];

		// Consulta código do cliente pelo email
		$consulta_cliente = $db_con->prepare("SELECT cliente.fk_usuario_codigo FROM USUARIO
			INNER JOIN CLIENTE ON (cliente.fk_usuario_codigo = usuario.codigo)
			WHERE email = :email");

		$consulta_cliente->bindParam(':email', $email);
		$consulta_cliente->execute();

		$lista_codigo_cliente = $consulta_cliente->fetch(PDO::FETCH_ASSOC);
		$codigo_cliente = $lista_codigo_cliente["fk_usuario_codigo"];

		// Consulta para obter dados do cliente, compra, item_compra, e produto
		$consulta = $db_con->prepare("SELECT cliente.*, compra.*, item_compra.*, produto.* FROM CLIENTE
			INNER JOIN COMPRA ON (compra.fk_cliente_fk_usuario_codigo = cliente.fk_usuario_codigo)
			INNER JOIN ITEM_COMPRA ON (item_compra.fk_compra_codigo = compra.codigo)
			INNER JOIN PRODUTO ON (item_compra.fk_produto_codigo = produto.codigo)
			WHERE cliente.fk_usuario_codigo = :codigo_cliente");

		$consulta->bindParam(':codigo_cliente', $codigo_cliente);
		//$consulta->execute();

		/*
		$email = $_GET['email'];
		
		// Consulta código do cliente pelo email
		$consulta_cliente = $db_con->prepare("SELECT cliente.fk_usuario_codigo FROM USUARIO
			INNER JOIN CLIENTE ON (cliente.fk_usuario_codigo = usuario.codigo)
			WHERE email = :email");

		$consulta_cliente->bindParam(':email', $email);
		$consulta_cliente->execute();

		$lista_codigo_cliente = $consulta_cliente->fetch(PDO::FETCH_ASSOC);
		$codigo_cliente = $lista_codigo_cliente["fk_usuario_codigo"];
		
		$consulta = $db_con->prepare("SELECT cliente.*, compra.*, item_compra.*, produto.* from CLIENTE
			inner join COMPRA
			on(compra.fk_cliente_fk_usuario_codigo = cliente.fk_usuario_codigo)
			inner join ITEM_COMPRA
			on(item_compra.fk_compra_codigo = compra.codigo)
			inner join PRODUTO
			on(item_compra.fk_produto_codigo = produto.codigo)
			where cliente.fk_usuario_codigo = " . $codigo_cliente);
		*/
		if ($consulta->execute()) {
  		//pega detalhes do produto comprado    	
			$resposta["compras"] = array();
			$resposta["sucesso"] = 1;
	
			if ($consulta->rowCount() > 0) {
				while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {	
					$itemCompra = array();
		  			$itemCompra["nome"] = $linha["nome"];
					$itemCompra["valor_item"] = $linha["valor_item"];
					$itemCompra["quantidade"] = $linha["quantidade"];

					array_push($resposta["compras"], $itemCompra);
				}			
	 		} else {
				$resposta["sucesso"] = 0;
				$resposta["erro"] = "Erro no BD: " . $consulta->error;			
			}
		} else {
			// Caso ocorra falha no BD, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido não preenchido";
	}
}
else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["error"] = "usuario ou senha não confere";
}
// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>
