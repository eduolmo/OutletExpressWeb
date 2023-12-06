<?php
 
/*
 * O código abaixo registra um novo usuário.
 * Método do tipo POST.
 */

require_once('conexao_db.php');

// array de resposta
$resposta = array();
 
// verifica se todos os campos necessários foram enviados ao servidor
if (isset($_POST['codigo_produto']) && isset($_POST['email']) && isset($_POST['quantidade'])) {
 
    // o método trim elimina caracteres especiais/ocultos da string
	$codigo_produto = trim($_POST['codigo_produto']);
	$email = trim($_POST['email']);
	$quantidade = trim($_POST['quantidade']);
	
	
	// antes de adicionar item ao carrinho, verificamos se ele já
	// não existe.
	$consulta_usuario_existe = $db_con->prepare("SELECT email FROM USUARIO INNER JOIN CLIENTE on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) INNER JOIN Item_carrinho on(Item_carrinho.fk_cliente_FK_USUARIO_codigo = CLIENTE.FK_USUARIO_codigo) WHERE email = '$email' AND fk_produto_codigo='$codigo_produto'");
	$consulta_usuario_existe->execute();
	if ($consulta_usuario_existe->rowCount() > 0) { 
		// se já existe um item no carrinho da pessoa com o
		// mesmo código e indicamos que a quantidade foi alterada,
		// além de indicar sucesso na operação.
		$consulta_item_carrinho = $db_con->prepare("SELECT Item_carrinho.* FROM Item_carrinho INNER JOIN CLIENTE on(Item_carrinho.fk_cliente_FK_USUARIO_codigo = CLIENTE.FK_USUARIO_codigo) INNER JOIN USUARIO on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) WHERE email = '$email' AND fk_produto_codigo='$codigo_produto'");
		//if($consulta_item_carrinho->execute()){
		$consulta_item_carrinho->execute()
		$row = $consulta_item_carrinho->fetch(PDO::FETCH_ASSOC);

		if ($row && isset($row['quantidade'])) {
			// Converta a string para inteiro
			$qtdAt = intval($row['quantidade']);
	
			// Soma a quantidade atual com a quantidade recebida pelo método POST
			$novaQuantidade = $qtdAt + $quantidade;
			
			// Atualiza a tabela com a nova quantidade
			$consulta_atualizar_qtd = $db_con->prepare("UPDATE Item_carrinho SET quantidade = '$novaQuantidade' FROM Item_carrinho INNER JOIN CLIENTE on(Item_carrinho.fk_cliente_FK_USUARIO_codigo = CLIENTE.FK_USUARIO_codigo) INNER JOIN USUARIO on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) WHERE email = '$email'");
			
			if($consulta_atualizar_qtd->execute()){
				$resposta["sucesso"] = 1;
			}else {
				// se houve erro na consulta, indicamos que não houve sucesso
				// na operação e o motivo no campo de erro.
				$resposta["sucesso"] = 0;
				$resposta["erro"] = "erro BD: " . $consulta_atualizar_qtd->error;
			}
		}	else {
			// Caso ocorra um erro na execução da consulta
			$resposta["sucesso"] = 0;
			$resposta["mensagem"] = "Item não encontrado no carrinho.";
		}
		/*
		} else {
			// Caso ocorra um erro na execução da consulta
			$resposta["sucesso"] = 0;
			$resposta["mensagem"] = "Erro na consulta.";
		}
		*/


	}
	else {
		// se o usuário ainda não existe, inserimos ele no bd.
		$consulta_codigo_cliente = $db_con->prepare("SELECT USUARIO.* FROM USUARIO INNER JOIN CLIENTE on(CLIENTE.FK_USUARIO_codigo = USUARIO.codigo) WHERE email = '$email'");
		if($consulta_codigo_cliente->execute()){
			$row = $consulta_codigo_cliente->fetch(PDO::FETCH_ASSOC);
			if ($row && isset($row['codigo'])) {
				$codigo_cliente = $row['codigo'];
				$consulta = $db_con->prepare("INSERT INTO Item_carrinho(fk_cliente_fk_usuario_codigo, fk_produto_codigo, quantidade) VALUES('$codigo_cliente', '$codigo_produto', '$quantidade')");
				if ($consulta->execute()){
					$resposta["sucesso"] = 1;
				} 
				else {
					// se houve erro na consulta, indicamos que não houve sucesso
					// na operação e o motivo no campo de erro.
					$resposta["sucesso"] = 0;
					$resposta["erro"] = "erro BD: " . $consulta->error;
				}
			} 
			else {
				// Caso ocorra um erro na execução da consulta
				$resposta["sucesso"] = 0;
				$resposta["mensagem"] = "Item não inserido no carrinho.";
			}
		} 
		else {
			// Caso ocorra um erro na execução da consulta
			$resposta["sucesso"] = 0;
			$resposta["mensagem"] = "Erro na consulta.";
		}
	}
}
else {
	// se não foram enviados todos os parâmetros para o servidor, 
	// indicamos que não houve sucesso
	// na operação e o motivo no campo de erro.
    $resposta["sucesso"] = 0;
	$resposta["erro"] = "faltam parametros";
}

// A conexão com o bd sempre tem que ser fechada
$db_con = null;

// converte o array de resposta em uma string no formato JSON e 
// imprime na tela.
echo json_encode($resposta);
?>