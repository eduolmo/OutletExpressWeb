<?php
//Classe de cliente
include_once 'usuario.php';

//Se a sessão não existir, então inicia a sessão
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}


//verifica se o botão cadastrar foi acionado
if(isset($_POST['enviar_formulario'])):
	
	//sanitiza os campos do formulário
	$nome=filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
	$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

	//instancia o cliente
	$usuario = new Usuario();	
	
	//informa os dados do cliente
	$usuario->setNome($nome);
	$usuario->setEmail($email);
	
	//insere o cliente
	if($usuario->insert()):
		$_SESSION['mensagem'] = "Cadastro com sucesso!";
		//header('Location: 30_consultar.php?sucesso');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar!";		
		//header('Location: 30_consultar?erro');
	endif;
endif;	



?>