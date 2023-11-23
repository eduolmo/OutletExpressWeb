<?php
//echo'cliente ';
require_once 'crud.php';
//echo'crud ';
require_once 'usuario.php';
//echo'usuario ';

class Cliente extends Usuario{
	//protected $table ='CLIENTE';
	private $cpf;

	/********Início dos métodos sets e gets*********/
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}

	
}

//echo'class_cliente ';

?>