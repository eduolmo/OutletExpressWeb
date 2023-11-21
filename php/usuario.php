<?php
echo 'usuario';
require_once 'crud.php';
require_once 'cliente.php';
/*require_once 'empresa.php';*/

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com o cliente do negócio.


Atributos:
$nome- nome do cliente
$sobrenome - sobrenome do cliente
$email - email do cliente
$idade - idade do cliente

Métodos:
insert - insere um cliente na tabela cliente
update - atualiza um cliente na tabela cliente

setNome - Atribui um nome ao cliente
getNome - Retorna o nome do cliente
setSobrenome - Atribui um sobrenome ao cliente
getSobrenome - Retorna o sobrenome ao cliente
setEmail - Atribui um email ao cliente
getEmail - Retorna o email do cliente
setIdade - Atribui uma idade ao cliente
getIdade - Retorn a idade do cliente
*************************************************************/

class Usuario extends CRUD{
	use Cliente, Empresa;
	
	protected $table ='USUARIO';
	protected $table ='EMPRESA';
	
	private $nome;
	private $email;
	private $senha;
	
	
	/********Início dos métodos sets e gets*********/
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}

	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (nome,email,senha) VALUES (:nome,:email,:senha)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':senha', $this->senha);
		
		return $stmt->execute();
		
	}
	
	/***************
	Objetivo: Atuliza um cliente pelo id
	Parâmetro de entrada: $id - id do cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function update($codigo){
		$sql="UPDATE $this->table SET nome = :nome, email = :email , WHERE codigo = :codigo ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':idade', $this->idade, PDO::PARAM_INT);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		// $stmt->bindParam(':tipocliente', 1, PDO::PARAM_INT);
		return $stmt->execute();
	}
	
	
	
	
		
	
}

?>