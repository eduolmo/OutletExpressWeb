<?php
    require_once 'crud.php';

    class Compra{
        public $forma_pagamento;
        //public $data_hora;

        /********Início dos métodos sets e gets*********/
        public function setPagamento($forma_pagamento){
            $this->pagamento = $forma_pagamento;
        }
        public function getPagamento(){
            return $this->forma_pagamento;
        }
    }
?>