<?php
 
/*
 * O código abaixo registra um novo usuário.
 * Método do tipo POST.
 */

require_once('conexao_db.php');

// autenticação
require_once('autenticacao.php');

// array de resposta
$resposta = array();
 
if(autenticar($db_con)) {
// verifica se todos os campos necessários foram enviados ao servidor
	if (isset($_POST['codigo_produto']) && isset($_POST['email'])) {
	
		// o método trim elimina caracteres especiais/ocultos da string
		$codigo_produto = trim($_POST['codigo_produto']);
		$email = trim($_POST['email']);
		
		// antes de adicionar item ao carrinho, verificamos se ele já
		// não existe.
		$consulta_codigo_cliente = $db_con->prepare("SELECT USUARIO.* FROM USUARIO INNER JOIN CLIENTE on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) WHERE email = '$email'");
		if($consulta_codigo_cliente->execute()){
			$row = $consulta_codigo_cliente->fetch(PDO::FETCH_ASSOC);
			if ($row && isset($row['codigo'])) {
				$codigo_cliente = $row['codigo'];
				$consulta_deletar_item_carrinho = $db_con->prepare("DELETE FROM item_carrinho WHERE fk_cliente_fk_usuario_codigo= '$codigo_cliente' AND fk_produto_codigo= '$codigo_produto'");
				if ($consulta_deletar_item_carrinho->execute()) { 
                    $resposta["sucesso"] = 1;
                } else {
                    $resposta["sucesso"] = 0;
                    $resposta["mensagem"] = "Erro ao deletar item do carrinho.";
                }
			}
			
		} else {
				// Caso ocorra um erro na execução da consulta
				$resposta["sucesso"] = 0;
				$resposta["mensagem"] = "Erro na consulta do código do cliente.";
		}
	} else {
		// se não foram enviados todos os parâmetros para o servidor, 
		// indicamos que não houve sucesso
		// na operação e o motivo no campo de erro.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "faltam parametros";
	}
}else {
	// senha ou usuario nao confere
	$resposta["sucesso"] = 0;
	$resposta["error"] = "usuario ou senha não confere";
}


// A conexão com o bd sempre tem que ser fechada
$db_con = null;

// converte o array de resposta em uma string no formato JSON e 
// imprime na tela.
echo json_encode($resposta);
?>