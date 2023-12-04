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
	if (isset($_GET["codigo_cliente"])) {
		
		// Aqui sao obtidos os parametros
		$codigo = $_GET['codigo_cliente'];
	 
		// Obtem do BD os detalhes do produto com id especificado na requisicao GET
		$consulta = $db_con->prepare('SELECT cliente.fk_usuario_codigo, compra.codigo as "codigo_compra", item_compra.codigo as "codigo_item_compra", produto.codigo as "codigo_produto" from cliente
		  inner join COMPRA
		  on(compra.fk_cliente_fk_usuario_codigo = :codigo_cliente)
		  inner join ITEM_COMPRA
		  on(item_compra.fk_compra_codigo = compra.codigo)
		  inner join PRODUTO
		  on(item_compra.fk_produto_codigo = produto.codigo)
		  where cliente.fk_usuario_codigo = :codigo_cliente');
		$consulta->bindParam(':codigo_cliente', $codigo_cliente); 
		
	 
		if ($consulta->execute()) {
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);	
			$codigo_produto = $linha[0]['codigo_produto'];

			$sql = $db_con->prepare('SELECT * FROM PRODUTO WHERE codigo = :codigo);
			$sql->bindParam(':codigo', $codigo_produto, PDO::PARAM_INT);
   
   			if($sql->execute()){      
				$produtos = $stmt->fetch(PDO::FETCH_ASSOC);
    				$resposta["nome"] = $produtos["nome"];
				$resposta["descricao"] = $produtos["descricao"];			
				$resposta["sucesso"] = 1;
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
