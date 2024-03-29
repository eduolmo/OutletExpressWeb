<?php
 
/*
 * O codigo seguinte retorna os atributos do COMENTARIO
 * Essa e uma requisicao do tipo GET. Uma empresa e identificada
 * pelo campo codigo.
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
	$consulta = $db_con->prepare('SELECT comentario.*,usuario.nome FROM COMENTARIO INNER JOIN CLIENTE ON(cliente.fk_USUARIO_codigo = comentario.fk_cliente_fk_USUARIO_codigo) INNER JOIN USUARIO ON(usuario.codigo = cliente.fk_USUARIO_codigo) WHERE comentario.fk_PRODUTO_codigo = ' . $codigo);
	
	

	if ($consulta->execute()) {
		// Caso existam comentarios no BD, eles sao armazenados na 
		// chave "comentarios". O valor dessa chave e formado por um 
		// array onde cada elemento e um comentario.
		$resposta["comentarios"] = array();
		$resposta["sucesso"] = 1;

		if ($consulta->rowCount() > 0) {
			while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
	
			// Se o produto existe, os dados completos do produto 
			// sao adicionados no array de resposta. A imagem nao 
			// e entregue agora pois ha um php exclusivo para obter 
			// a imagem do produto.
			//$linha = $consulta->fetch(PDO::FETCH_ASSOC);
	
			$comentarios = array();
			$comentarios["nome"] = $linha["nome"];
			$comentarios["conteudo"] = $linha["conteudo"];
			$comentarios["avaliacao"] = $linha["avaliacao"];	
			
			// Adiciona o comentario no array de comentario.
			array_push($resposta["comentarios"], $comentarios);
			
			// Caso o produto exista no BD, o cliente 
			// recebe a chave "sucesso" com valor 1.
			//$resposta["sucesso"] = 1;
			}
		} 
	} 
	else {
		// Caso ocorra falha no BD, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Erro no BD: " . $consulta->error;
	}
} 
else {
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