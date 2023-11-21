<?php
require_once 'crud.php'

class Empresa extends CRUD{

	private $cnpj;
		
	/********Início dos métodos sets e gets*********/
	public function setCnpj($cnpj){
		$this->cnpj = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}

	/********Fim dos métodos sets e gets*********/
	
}

?>