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
	if (isset($_POST['forma_pagamento']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['cep']) && isset($_POST['rua']) && isset($_POST['numero']) && isset($_POST['codigo_produto']) && isset($_POST['quantidade'])) {
		
		// Aqui sao obtidos os parametros
		$forma_pagamento = $_POST['forma_pagamento'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
		$cep = $_POST['cep'];
		$rua = $_POST['rua'];
		$numero = $_POST['numero'];
		$codigo_produto = intval($_POST['codigo_produto']);
		$qtd = $_POST['quantidade'];

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
			$lista_compra = $consulta_compra->fetch(PDO::FETCH_ASSOC);
			
			
			//inserir ItemCompra quando ComprarTudo do carrinho
			if($codigo_produto == ""){
				$pegar_item_carrinho = $db_con->prepare("SELECT * FROM ITEM_CARRINHO INNER JOIN CLIENTE ON(cliente.fk_usuario_codigo = item_carrinho.fk_cliente_fk_usuario_codigo) WHERE item_carrinho.fk_cliente_fk_usuario_codigo = :codigo_cliente");
				$pegar_item_carrinho->bindParam(':codigo_cliente', $codigo_cliente);
				$pegar_item_carrinho->execute();
				$itens_carrinho = $pegar_item_carrinho->fetchAll(PDO::FETCH_ASSOC);
				$resposta['$itens_carrinho'] = $itens_carrinho;

				for($i = 0; $i < sizeof($itens_carrinho); $i++){
					
					$pegar_valor_item = $db_con->prepare("SELECT valor_atual FROM PRODUTO WHERE codigo = :codigo_produto");
					$pegar_valor_item->bindParam(':codigo_produto', $itens_carrinho[$i]['fk_produto_codigo']);
					$pegar_valor_item->execute();
					$valor_item = $pegar_valor_item->fetch(PDO::FETCH_ASSOC);
					$resposta['$valor_item'] = $valor_item;

					$itemcompra_insercao = $db_con->prepare("INSERT INTO ITEM_COMPRA(valor_item, fk_compra_codigo, fk_produto_codigo, quantidade) VALUES(:valor_item, :fk_compra_codigo, :fk_produto_codigo, :qtd)");
					$itemcompra_insercao->bindParam(':valor_item', $valor_item['valor_atual']); // Ajuste aqui
					$itemcompra_insercao->bindParam(':fk_compra_codigo', $lista_compra['codigo']);
					$itemcompra_insercao->bindParam(':fk_produto_codigo', $itens_carrinho[$i]['fk_produto_codigo']);
					$itemcompra_insercao->bindParam(':qtd', $itens_carrinho[$i]['quantidade']);
					$itemcompra_insercao->execute();
				}		
			}//inserir ItemCompra quando ComprarAgora
			else{
				$pegar_valor_item = $db_con->prepare("SELECT valor_atual FROM PRODUTO WHERE codigo = :codigo_produto");
				$pegar_valor_item->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);
				$pegar_valor_item->execute();
				$valor_item = $pegar_valor_item->fetch(PDO::FETCH_ASSOC);

				$itemcompra_insercao = $db_con->prepare("INSERT INTO ITEM_COMPRA(valor_item, fk_compra_codigo, fk_produto_codigo, quantidade) VALUES(:valor_item, :fk_compra_codigo, :fk_produto_codigo, :qtd)");
				$itemcompra_insercao->bindParam(':valor_item', $valor_item['valor_atual']); 
				$itemcompra_insercao->bindParam(':fk_compra_codigo', $lista_compra['codigo']);
				$itemcompra_insercao->bindParam(':fk_produto_codigo', $codigo_produto);
				$itemcompra_insercao->bindParam(':qtd', $qtd);
				$itemcompra_insercao->execute();
			}

			$resposta["sucesso"] = 1;
		}
		else{
			$resposta["sucesso"] = 0;
			$resposta["erro"] = "Erro ao inserir endereco no BD: " . $consulta->error;
		}
		
	} else {
		$resposta["sucesso"] = 0;
		$resposta["erro"] = "Campo requerido nao preenchido";
	}


	// Fecha a conexao com o BD
	$db_con = null;

	// Converte a resposta para o formato JSON.
	echo json_encode($resposta);
?>