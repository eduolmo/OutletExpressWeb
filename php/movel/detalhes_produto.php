<?php
 
/*
 * O codigo seguinte retorna os dados detalhados de um produto.
 * Essa e uma requisicao do tipo GET. Um produto e identificado 
 * pelo campo id.
 */

// conexão com bd
require_once('conexao_db.php');

// array de resposta
$resposta = array();

// Verifica se o parametro id foi enviado na requisicao
if (isset($_GET["codigo"])) {
	
	// Aqui sao obtidos os parametros
	$codigo = $_GET['codigo'];
	
	// Obtem do BD os detalhes do produto com id especificado na requisicao GET
	$consulta = $db_con->prepare('SELECT produto.nome as "produtoNome",produto.*,empresa.link,usuario.nome as "nomeEmpresa" FROM PRODUTO INNER JOIN EMPRESA ON(produto.fk_EMPRESA_fk_USUARIO_codigo = empresa.fk_USUARIO_codigo) INNER JOIN USUARIO ON(usuario.codigo = empresa.fk_USUARIO_codigo) WHERE produto.codigo = ' . $codigo);
	
	if ($consulta->execute()) {
		if ($consulta->rowCount() > 0) {
	
			// Se o produto existe, os dados completos do produto 
			// sao adicionados no array de resposta. A imagem nao 
			// e entregue agora pois ha um php exclusivo para obter 
			// a imagem do produto.
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	
			$resposta["nome"] = $linha["nomeProduto"];
			$resposta["valor_atual"] = $linha["valor_atual"];
			$resposta["descricao"] = $linha["descricao"];
			$resposta["imagem"] = $linha["imagem"];
			$resposta["desconto"] = $linha["desconto"];
			$resposta["avaliacao"] = $linha["avaliacao"];
			$resposta["link_empresa"] = $linha["link"];
			$resposta["nome_empresa"] = $linha["nomeEmpresa"];
			
			// Caso o produto exista no BD, o cliente 
			// recebe a chave "sucesso" com valor 1.
			$resposta["sucesso"] = 1;
			
		} else {
			// Caso o produto nao exista no BD, o cliente 
			// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
			// motivo da falha.
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Produto não encontrado";
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

// Fecha a conexao com o BD
$db_con = null;

// Converte a resposta para o formato JSON.
echo json_encode($resposta);
?>