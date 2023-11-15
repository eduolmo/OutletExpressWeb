<?php

trait Cliente {
	
	private $cpf;
		
		
	/********Início dos métodos sets e gets*********/
	public function setcpf($cpf){
		$this->cpf = $cpf;
	}
	public function getcpf(){
		return $this->cpf;
	}

	/********Fim dos métodos sets e gets*********/
	
}

?>