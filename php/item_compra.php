<?php
    require_once 'crud.php';

    class Item_compra{
        public $valor_item;
        public $quantidade;

        /********Início dos métodos sets e gets*********/
        public function setValor($valor_item){
            $this->valor = $valor_item;
        }
        public function getPagamento(){
            return $this->valor;
        }
    }
?>