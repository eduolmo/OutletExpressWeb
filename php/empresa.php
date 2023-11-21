<?php
require_once 'crud.php'

trait Empresa{

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