<?php
require_once 'crud.php'

class Cliente extends CRUD{

	protected $table = 'cliente';
	private $cpf;
	private $email;
	private $nome;
	private $senha;
		
		
	/********Início dos métodos sets e gets*********/
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}

	/********Fim dos métodos sets e gets*********/
	

	/***************
	Objetivo: Método que insere um cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO usuario/*$this->table*/ (nome,email,senha) VALUES (:nome,:email,:senha)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		
		return $stmt->execute();
		
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo email
	Parâmetro de entrada: $email - email do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($email){
		$sql="UPDATE $this->table SET nome = :nome, senha = :senha , WHERE email = :email ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->bindParam(':email', $email);
		return $stmt->execute();
	}
}

?>