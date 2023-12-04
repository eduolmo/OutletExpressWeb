<?php

require_once 'crud.php';

/*************************************************************
Objetivo: Classe responsável por representar todas as operações com os produtos do negócio.


Atributos:
$imagem      - imagem do produto
$descricao   - descrição das informações produto
$valor_atual - valor atual do produto
$nome        - nome do produto
$avaliacao   - avaliacao (de 1 a 5) do produto
$desconto    - desconto no valor do produto

Métodos:
insert - insere um produto na tabela produto
update - atualiza um produto na tabela produto

setDescricao - Atribui uma descricao ao produto
getDescricao - Retorna a descricao ao produto
*************************************************************/

class Produto extends CRUD {
	
	protected $table ='produto';
	
	private $imagem;
	private $descricao;
	private $valor_atual;
    private $nome;
    private $avaliacao;
    private $desconto;

	/********Início dos métodos sets e gets*********/
	public function setimagem($imagem){
		$this->imagem = $imagem;
	}
	public function getimagem(){
		return $this->imagem;
	}	
    public function setdescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getdescricao(){
		return $this->descricao;
	}	
    public function setvalor_atual($valor_atual){
		$this->valor_atual = $valor_atual;
	}
	public function getvalor_atual(){
		return $this->valor_atual;
	}	
    public function setnome($nome){
		$this->nome = $nome;
	}
	public function getnome(){
		return $this->nome;
	}	
    public function setavaliacao($avaliacao){
		$this->avaliacao = $avaliacao;
	}
	public function getavaliacao(){
		return $this->avaliacao;
	}
	public function setdesconto($desconto){
		$this->desconto = $desconto;
	}
	public function getdesconto(){
		return $this->desconto;
	}
	/********Fim dos métodos sets e gets*********/
	
	
	/***************
	Objetivo: Método que insere um produto
	Parâmetro de saída: Retorna true em caso de sucesso ou false em caso de falha.
	***************/
	public function insert(){
		$sql="INSERT INTO $this->table (imagem,descricao,valor_atual,nome,avaliacao,desconto) VALUES (:imagem,:descricao,:valor_atual,:nome,:avaliacao,:desconto)";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':imagem', $this->imagem);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':valor_atual', $this->valor_atual, PDO::PARAM_STR);
		$stmt->bindParam(':nome', $this->nome, PDO::PARAM_INT);
		$stmt->bindParam(':avaliacao', $this->avaliacao, PDO::PARAM_STR);
		$stmt->bindParam(':desconto', $this->desconto, PDO::PARAM_STR);

		return $stmt->execute();
		
	}

	public function categorizeProducts($categoria){
		$sql = "SELECT produto.codigo,imagem,nome,valor_atual,avaliacao,desconto FROM $this->table INNER JOIN categoria_produto ON(categoria_produto.codigo = fk_categoria_produto_codigo) WHERE categoria_produto.descricao = :categoria";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':categoria', $categoria, PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function searchProducts($pesquisa){
		$sql = "SELECT produto.codigo,imagem,nome,valor_atual,avaliacao,desconto FROM $this->table WHERE UNACCENT(LOWER(nome)) LIKE UNACCENT(LOWER(:pesquisa))";
		$stmt = Database::prepare($sql);
		$stmt->bindValue(':pesquisa', "%$pesquisa%", PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function filterProducts($precoMin,$precoMax,$desconto,$avaria,$avaliacao){
		$sql = "SELECT * FROM $this->table INNER JOIN CATEGORIA_AVARIA ON(categoria_avaria.codigo = produto.fk_categoria_avaria_codigo) WHERE valor_atual BETWEEN :precoMin AND :precoMax AND avaliacao >= :avaliacao_min AND categoria_avaria.descricao = :avaria AND desconto >= :desconto_min";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':precoMin', $precoMin, PDO::PARAM_INT);
		$stmt->bindParam(':precoMax', $precoMax, PDO::PARAM_INT);
		$stmt->bindParam(':desconto', $desconto, PDO::PARAM_INT);
		$stmt->bindParam(':avaria', $avaria);
		$stmt->bindParam(':avaliacao_min', $avaliacao, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function productDetail($codigo){
		$sql = "SELECT * FROM $this->table WHERE codigo = :codigo";
		$stmt = Database::prepare($sql);
		$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function update($codigo){
		return 0;
	}
}
?>