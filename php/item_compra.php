<?php
    require_once 'crud.php';

    class Item_compra{
        public $valor_item;
        public $quantidade;
        public $fk_compra_codigo;
        public $fk_produto_codigo;

        /********Início dos métodos sets e gets*********/
        public function setValor($valor_item){
            $this->valor = $valor_item;
        }
        public function getValor(){
            return $this->valor;
        }
        public function setQuantidade($quantidade){
            $this->quantidade = $quantidade;
        }
        public function getQuantidade(){
            return $this->quantidade;
        }
        public function setCompraCodigo($fk_compra_codigo){
            $this->fk_compra_codigo = $fk_compra_codigo;
        }
        public function getCompraCodigo(){
            return $this->fk_compra_codigo;
        }
        public function setProdutoCodigo($fk_produto_codigo){
            $this->fk_produto_codigo = $fk_produto_codigo;
        }
        public function getProdutoCodigo(){
            return $this->fk_produto_codigo;
        }

        public function insere_item_compra(){
            $sql="INSERT INTO ITEM_COMPRA(valor_item, fk_compra_codigo, fk_produto_codigo, quantidade) VALUES(:valor_item, :fk_compra_codigo, :fk_produto_codigo, :quantidade)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':valor_item', $this->valor);
            $stmt->bindParam(':fk_compra_codigo', $this->fk_compra_codigo);
            $stmt->bindParam(':fk_produto_codigo', $this->fk_produto_codigo);
            $stmt->bindParam(':quantidade', $this->quantidade);
            
            return $stmt->execute();
            
        }
    }
?>