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
	if (isset($_POST['forma_pagamento']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['cep']) && isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['itens_compra'])) {
		
		// Aqui sao obtidos os parametros
		$forma_pagamento = $_POST['forma_pagamento'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
		$cep = $_POST['cep'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$itens_compra = $_POST['itens_compra'];

		/*
		$consulta_cliente = $db_con->prepare("SELECT cliente.fk_usuario_codigo FROM USUARIO
		INNER JOIN CLIENTE ON (cliente.fk_usuario_codigo = usuario.codigo)
		WHERE email = :email");*/

		$consulta_cliente = $db_con->prepare("SELECT usuario.codigo FROM USUARIO
		WHERE email = :email");

		$consulta_cliente->bindParam(':email', $email);
		$consulta_cliente->execute();
		$lista_codigo_cliente = $consulta_cliente->fetch(PDO::FETCH_ASSOC);
		$codigo_cliente = $lista_codigo_cliente["codigo"];

		$insere_endereco = $db_con->prepare("INSERT INTO ENDERECO(numero, cep, nome_logradouro, fk_tipo_logradouro_codigo, fk_pais_codigo) VALUES(:numero, :cep, :rua, 1, 1)");

		// Substituindo os parâmetros usando bindParam
		$insere_endereco->bindParam(':numero', $numero, PDO::PARAM_INT);
		$insere_endereco->bindParam(':cep', $cep);
		$insere_endereco->bindParam(':rua', $rua);
		
		if($insere_endereco->execute()){
			$consulta_endereco = $db_con->prepare("SELECT codigo FROM ENDERECO WHERE numero = :numero AND cep = :cep AND nome_logradouro = :nome_logradouro");

			// Substitua os marcadores de posição pelos valores reais
			$consulta_endereco->bindParam(':numero', $numero);
			$consulta_endereco->bindParam(':cep', $cep);
			$consulta_endereco->bindParam(':nome_logradouro', $rua);
			$consulta_endereco->execute();
			$lista_endereco = $consulta_endereco->fetch(PDO::FETCH_ASSOC);
			$codigo_endereco = $lista_endereco["codigo"];

			//aqui
			$busca_cliente = $db_con->prepare("SELECT fk_usuario_codigo FROM CLIENTE WHERE fk_usuario_codigo = :codigo_cliente");
			$busca_cliente->bindParam(':codigo_cliente', $codigo_cliente);
			if($busca_cliente->execute()){
				if(!$busca_cliente->rowCount() > 0){
					//insere endereco para cliente
					//$endereco_cliente = $db_con->prepare("INSERT INTO CLIENTE(cpf, fk_usuario_codigo, fk_endereco_codigo) VALUES('$cpf', $codigo_cliente, $codigo_endereco)");
					$endereco_cliente = $db_con->prepare("INSERT INTO CLIENTE(cpf, fk_usuario_codigo, fk_endereco_codigo) VALUES(:cpf, :codigo_cliente, :codigo_endereco)");
					// Substitua os marcadores de posição pelos valores reais
					$endereco_cliente->bindParam(':cpf', $cpf);
					$endereco_cliente->bindParam(':codigo_cliente', $codigo_cliente);
					$endereco_cliente->bindParam(':codigo_endereco', $codigo_endereco);
					$endereco_cliente->execute();
				}
			}

			
			// Consulta a data e hora atual com fuso horário do Brasil

			$consulta_data = $db_con->prepare("SELECT CURRENT_TIMESTAMP AT TIME ZONE 'America/Sao_Paulo' AS data_hora_brasil");
			$consulta_data->execute();
			$resposta_data = $consulta_data->fetch(PDO::FETCH_ASSOC);
			$data_hora = $resposta_data["data_hora_brasil"];

			// Insere uma compra usando consulta preparada
			$consulta_insercao = $db_con->prepare("INSERT INTO COMPRA(forma_pagamento, fk_cliente_fk_usuario_codigo, data) VALUES(:forma_pagamento, :codigo_cliente, :data_hora)");

			// Substitua os marcadores de posição pelos valores reais
			$consulta_insercao->bindParam(':forma_pagamento', $forma_pagamento);
			$consulta_insercao->bindParam(':codigo_cliente', $codigo_cliente);
			$consulta_insercao->bindParam(':data_hora', $data_hora);
			$consulta_insercao->execute();

			$consulta_compra = $db_con->prepare("SELECT * FROM COMPRA WHERE data = :data_hora");
			$consulta_compra->bindParam(':data_hora', $data_hora);
			$consulta_compra->execute();
			$lista_compra = $consulta_compra->fetch(PDO::FETCH_BOTH);


			//inserir ItemCompra
			for($i = 0; $i < sizeof($itens_compra); $i++){
				$itemcompra_insercao = $db_con->prepare("INSERT INTO ITEM_COMPRA(valor_item, fk_compra_codigo, fk_produto_codigo, quantidade) VALUES(:valor_item, :fk_compra_codigo, :fk_produto_codigo, :qtd)");
				$itemcompra_insercao->bindParam(':valor_item', $itens_compra[$i]['valor']);
				$itemcompra_insercao->bindParam(':fk_compra_codigo', $lista_compra['codigo']);
				$itemcompra_insercao->bindParam(':fk_produto_codigo', $itens_compra[$i]['produto_codigo']);
				$itemcompra_insercao->bindParam(':qtd', $itens_compra[$i]['qtd']);
				$itemcompra_insercao->execute();
			}			


			$resposta["sucesso"] = 1;
		}
		else{
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao inserir endereco no BD: " . $consulta->error;
		}




		
		
		/*
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
		$consulta = $db_con->prepare("INSERT INTO COMPRA(forma_pagamento, fk_cliente_fk_usuario_codigo, data) VALUES('$forma_pagamento', $codigo_cliente, '$data_hora')");	
		*/
		
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