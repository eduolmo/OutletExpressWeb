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

	/***************
	Objetivo: Método que insere um cliente
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/

	public function dados_produto_comprados($codigo_cliente){
		$consulta = "SELECT cliente.*, compra.*, item_compra.*, produto.* FROM CLIENTE
			INNER JOIN COMPRA ON (compra.fk_cliente_fk_usuario_codigo = cliente.fk_usuario_codigo)
			INNER JOIN ITEM_COMPRA ON (item_compra.fk_compra_codigo = compra.codigo)
			INNER JOIN PRODUTO ON (item_compra.fk_produto_codigo = produto.codigo)
			WHERE cliente.fk_usuario_codigo = :codigo_cliente";
		$consulta = Database::prepare($consulta);
		$consulta->bindParam(':codigo_cliente', $codigo_cliente);
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_ASSOC);
	}

}



//echo'class_cliente ';

?>