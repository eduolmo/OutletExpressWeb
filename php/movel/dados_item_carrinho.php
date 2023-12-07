<?php
 
/*
 * O codigo seguinte retorna os atributos da entidade ITEM_CARRINHO
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
		
		// Aqui sao obtidos os parametros
		$email = $_GET['email'];
		
		$consulta_codigo_cliente = $db_con->prepare("SELECT USUARIO.codigo FROM USUARIO INNER JOIN CLIENTE on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) WHERE email = '$email'");
		
		// Obtem do BD os detalhes do produto com id especificado na requisicao GET
		if ($consulta_codigo_cliente->execute()) {
			$row = $consulta_codigo_cliente->fetch(PDO::FETCH_ASSOC);
			if ($row && isset($row['codigo'])) {
				$codigo_cliente = $row['codigo'];
				$consulta = $db_con->prepare("SELECT Item_carrinho.*, PRODUTO.* FROM PRODUTO INNER JOIN Item_carrinho on(Item_carrinho.fk_PRODUTO_codigo = PRODUTO.codigo) INNER JOIN CLIENTE on(Item_carrinho.fk_cliente_FK_USUARIO_codigo = CLIENTE.FK_USUARIO_codigo) INNER JOIN USUARIO on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) WHERE email = '$email'");
				
				$resposta["itensCarrinho"] = array();
				$resposta["sucesso"] = 1;

				if ($consulta->execute()) {
					if ($consulta->rowCount() > 0) {
						while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
							$itemCarrinho = array();

							$itemCarrinho["nome"] = $linha["nome"];
							$itemCarrinho["codigo_produto"] = $linha["fk_produto_codigo"];
							$itemCarrinho["imagem"] = $linha["imagem"];
							$itemCarrinho["valor_atual"] = $linha["valor_atual"];		
							$itemCarrinho["quantidade"] = $linha["quantidade"];	

							array_push($resposta["itensCarrinho"], $itemCarrinho);

						}
					} else {
						// Caso o produto nao exista no BD, o cliente 
						// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
						// motivo da falha.
						$resposta["sucesso"] = 0;
						$resposta["erro"] = "Carrinho não encontrado";
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
	}  else{
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Codigo do cliente não encontrado";
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