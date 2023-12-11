<?php

require_once 'crud.php';

class comentario extends CRUD {
	protected $table ='comentario';
	
	private $conteudo;
    private $avaliacao;
	private $fk_CLIENTE_FK_USUARIO_codigo;
	private $fk_PRODUTO_codigo;
	
	/********Início dos métodos sets e gets*********/
	public function setConteudo($conteudo){
		$this->conteudo = $conteudo;
	}
	public function getConteudo(){
		return $this->conteudo;
	}
    public function setAvaliacao($avaliacao){
		$this->avaliacao = $avaliacao;
	}
	public function getAvaliacao(){
		return $this->avaliacao;
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

}

public function insert(){
    $sql="INSERT INTO $this->table (conteudo,avaliacao,fk_CLIENTE_FK_USUARIO_codigo,fk_PRODUTO_codigo) VALUES (:conteudo, :avaliacao,:fk_CLIENTE_FK_USUARIO_codigo,:fk_PRODUTO_codigo)";
    $stmt = Database::prepare($sql);
    $stmt->bindParam(':conteudo', $this->conteudo, PDO::PARAM_INT);	
    $stmt->bindParam(':avaliacao', $this->avaliacao, PDO::PARAM_INT);	
    $stmt->bindParam(':fk_CLIENTE_FK_USUARIO_codigo', $this->fk_CLIENTE_FK_USUARIO_codigo, PDO::PARAM_INT);	
    $stmt->bindParam(':fk_PRODUTO_codigo', $this->fk_PRODUTO_codigo, PDO::PARAM_INT);		
    return $stmt->execute();
    
}

public function verificarComentario($codigo_produto, $codigo_cliente){
    $sql="SELECT * FROM $this->table WHERE fk_cliente_fk_usuario_codigo=:fk_cliente_fk_usuario_codigo AND fk_produto_codigo=:codigo_produto";
    $stmt = Database::prepare($sql);
    $stmt->bindParam(':fk_cliente_fk_usuario_codigo', $codigo_cliente, PDO::PARAM_INT);    
    $stmt->bindParam(':codigo_produto', $codigo_produto, PDO::PARAM_INT);    
    $stmt->execute();

    // Verifica se o registro existe no banco de dados
    if($stmt->rowCount() > 0){
        return true; // Comentario existe
    } else {
        return false; // Comentario não existe
    }
}

?>