<?php
	
	/*
	* O seguinte codigo abre uma conexao com o BD e adiciona uma compra nele.
	* As informacoes de um produto sao recebidas atraves de uma requisicao POST.
	*/

	// conexão com bd
	require_once('conexao_db.php');

	// array de resposta
	$resposta = array();
		
	// Primeiro, verifica-se se todos os parametros foram enviados pelo cliente.
	if (isset($_POST['forma_pagamento']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['cep']) && isset($_POST['rua']) && isset($_POST['numero'])) {
		
		// Aqui sao obtidos os parametros
		$forma_pagamento = $_POST['forma_pagamento'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
		$cep = $_POST['cep'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];

		//consulta codigo do cliente pelo email
		// Consulta código do cliente pelo email
		$consulta_cliente = $db_con->prepare("SELECT cliente.fk_usuario_codigo FROM USUARIO
			INNER JOIN CLIENTE ON (cliente.fk_usuario_codigo = usuario.codigo)
			WHERE email = :email");

		$consulta_cliente->bindParam(':email', $email);
		$consulta_cliente->execute();
		$lista_codigo_cliente = $consulta_cliente->fetch(PDO::FETCH_ASSOC);
		$codigo_cliente = $lista_codigo_cliente["fk_usuario_codigo"];

		//consulta data_hora atual
		$consulta_data = $db_con->prepare("SELECT CURRENT_TIMESTAMP AT TIME ZONE 'America/Sao_Paulo' AS data_hora_brasil");
		$consulta_data->execute();
		$resposta_data = $consulta_data->fetch(PDO::FETCH_ASSOC);
		$data_hora = $resposta_data["data_hora_brasil"];

		//insere uma compra
		$consulta = $db_con->prepare("INSERT INTO COMPRA(forma_pagamento, fk_cliente_fk_usuario_codigo, data_hora) VALUES('$forma_pagamento', $codigo_cliente, '$data_hora')");	
		if ($consulta->execute()) {			
			//insere endereco do cliente
			$insere_endereco = $db_con->prepare("INSERT INTO ENDERECO(numero, cep, nome_logradouro) VALUES($numero, '$cep', '$rua')");
			$lista_endereco = $consulta_cliente->fetch(PDO::FETCH_ASSOC);
			$codigo_endereco = $lista_endereco["codigo"];
			
			if($insere_endereco->execute()){
				//insere endereco para cliente
				$endereco_cliente = $db_con->prepare("INSERT INTO CLIENTE(cpf, fk_usuario_codigo, fk_endereco_codigo) VALUES('$cpf', $codigo_cliente, $codigo_endereco)");
				$resposta["sucesso"] = 1;
			}
			
		} else {
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao criar compra no BD: " . $consulta->error;
		}
	} else {
		// Se a requisicao foi feita incorretamente, ou seja, os parametros 
		// nao foram enviados corretamente para o servidor, o cliente 
		// recebe a chave "sucesso" com valor 0. A chave "erro" indica o 
		// motivo da falha.
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido nao preenchido";
	}


	// Fecha a conexao com o BD
	$db_con = null;

	// Converte a resposta para o formato JSON.
	echo json_encode($resposta);
?>