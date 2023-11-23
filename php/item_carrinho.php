<?php

require_once 'crud.php';

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com o item do carrinho do negócio.


Atributos:
$quantidade - descrição do item do carrinho

Métodos:
insert - insere um item do carrinho na tabela item_carrinho

setQuantidade - Atribui uma quantidade ao item do carrinho
getQuantidade - Retorna a quantidade ao item do carrinho
*************************************************************/

class item_carrinho extends CRUD {
	
	protected $table ='item_carrinho';
	
	private $quantidade;
	 
	
	/********Início dos métodos sets e gets*********/
	public function setid($quantidade){
		$this->quantidade = $quantidade;
	}
	public function getid(){
		return $this->quantidade;
	}
	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um item do carrinho
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (quantidade) VALUES (:quantidade)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':quantidade', $this->quantidade);		
		return $stmt->execute();
		
	}
	
}

?>