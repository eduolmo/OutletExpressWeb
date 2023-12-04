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

class ItemCarrinho extends CRUD {
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

	public static function update(){
		$codigo_produto = $_POST['codigo_produto'];
		$codigo_cliente = $_POST['codigo_cliente'];
		$quantidade = $_POST['quantidade'];
		
		$sql = "UPDATE item_carrinho SET quantidade = :quantidade WHERE fk_PRODUTO_codigo = :codigo_produto AND fk_CLIENTE_FK_USUARIO_codigo = :codigo_cliente";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
		$stmt->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
		$stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);
		$stmt->execute();
	}
	
	public function deleteItem($codigo_produto,$codigo_cliente){
		if(isset($_POST['deleteic'])){
			try{
				$sql = "DELETE FROM item_carrinho WHERE fk_CLIENTE_FK_USUARIO_codigo = :codigo_cliente AND fk_PRODUTO_codigo = :codigo_produto";
				$stmt = Database::prepare($sql);
				$stmt->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
				$stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);
				$stmt->execute();
			} catch (PDOException $e) {
				echo "Erro na execução da consulta: " . $e->getMessage();
			}
		}
	}

	public static function deleteCarrinho(){
		$codigo_cliente = $_POST['codigo_cliente'];
		
		$sql="DELETE FROM item_carrinho WHERE fk_CLIENTE_FK_USUARIO_codigo = :codigo_cliente";
		$stmt = Database::prepare($sql);	
		$stmt->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
		return $stmt->execute();	
	}
	
	public function updatePlus($codigo_produto, $codigo_cliente, $quantidade){
		// Obtêm a quantidade atual do produto no banco de dados
        $sql="SELECT * FROM item_carrinho WHERE fk_PRODUTO_codigo = :codigo_produto AND fk_CLIENTE_FK_USUARIO_codigo = :codigo_cliente";

		$listacarrinho = Database::prepare($sql);
		$listacarrinho->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
		$listacarrinho->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);
		$listacarrinho->execute();
		
		$row = $listacarrinho->fetch(PDO::FETCH_ASSOC);
		
        if ($row && isset($row['quantidade'])) {
			// Converta a string para inteiro
			$qtdAt = intval($row['quantidade']);
	
			// Soma a quantidade atual com a quantidade recebida pelo método POST
			$novaQuantidade = $qtdAt + $quantidade;
	
			// Atualiza a quantidade do produto no carrinho no banco de dados
			$sql = "UPDATE $this->table SET quantidade = :novaQuantidade WHERE fk_PRODUTO_codigo = :codigo_produto AND fk_CLIENTE_FK_USUARIO_codigo = :codigo_cliente";
	
			$stmt = Database::prepare($sql);
			$stmt->bindParam(':novaQuantidade', $novaQuantidade, PDO::PARAM_INT);
			$stmt->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
			$stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);
			return $stmt->execute();
		} else {
			// Faça algo aqui caso a chave 'quantidade' não esteja definida
			return false;
		}
	}
	
	public function verificarProdutoNoCarrinho($codigo_produto, $codigo_cliente){
		$sql="SELECT * FROM $this->table WHERE fk_cliente_fk_usuario_codigo=:fk_cliente_fk_usuario_codigo AND fk_produto_codigo=:codigo_produto";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':fk_cliente_fk_usuario_codigo', $codigo_cliente, PDO::PARAM_INT);    
		$stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);    
		$stmt->execute();
	
		// Verifica se o registro existe no banco de dados
		if($stmt->rowCount() > 0){
			return true; // Item encontrado no carrinho
		} else {
			return false; // Item não encontrado no carrinho
		}
	}


}

if (isset($_POST['action']) && $_POST['action'] === 'update') {
    // Chama o método estático update da classe ItemCarrinho
    ItemCarrinho::update($_POST['codigo_produto'], $_POST['codigo_cliente'], $_POST['quantidade']);
}

if (isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Chama o método estático update da classe ItemCarrinho
    ItemCarrinho::deleteCarrinho($_POST['codigo_cliente']);
}
?>