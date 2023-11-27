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
	private $fk_CLIENTE_FK_USUARIO_codigo;
	private $fk_PRODUTO_codigo;
	
	/********Início dos métodos sets e gets*********/
	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}
	public function getQuantidade(){
		return $this->quantidade;
	}
	public function setFk_CLIENTE_FK_USUARIO_codigo($fk_CLIENTE_FK_USUARIO_codigo){
		$this->fk_CLIENTE_FK_USUARIO_codigo = $fk_CLIENTE_FK_USUARIO_codigo;
	}
	public function getFk_CLIENTE_FK_USUARIO_codigo(){
		return $this->fk_CLIENTE_FK_USUARIO_codigo;
	}
	public function setFk_PRODUTO_codigo($fk_PRODUTO_codigo){
		$this->fk_PRODUTO_codigo = $fk_PRODUTO_codigo;
	}
	public function getFk_PRODUTO_codigo(){
		return $this->fk_PRODUTO_codigo;
	}
	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um item do carrinho
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (quantidade,fk_CLIENTE_FK_USUARIO_codigo,fk_PRODUTO_codigo) VALUES (:quantidade,:fk_CLIENTE_FK_USUARIO_codigo,:fk_PRODUTO_codigo)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':quantidade', $this->quantidade, PDO::PARAM_INT);	
		$stmt->bindParam(':fk_CLIENTE_FK_USUARIO_codigo', $this->fk_CLIENTE_FK_USUARIO_codigo, PDO::PARAM_INT);	
		$stmt->bindParam(':fk_PRODUTO_codigo', $this->fk_PRODUTO_codigo, PDO::PARAM_INT);		
		return $stmt->execute();
		
	}

	public function update($codigo){
		$sql="UPDATE $this->table SET quantidade = :quantidade, WHERE codigo = :codigo ";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':quantidade', $this->quantidade, PDO::PARAM_INT);
		return $stmt->execute();
	}
	
	public function verificarProdutoNoCarrinho($codigo){
		
	}
}

?>