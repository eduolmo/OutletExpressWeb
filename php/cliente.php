<?php
require_once 'crud.php'

trait Cliente{

	private $cpf;

		
	/********Início dos métodos sets e gets*********/
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}

	/********Fim dos métodos sets e gets*********/
	
}

?>