<?php
    require_once 'crud.php';

    class Compra{
        public $forma_pagamento;
        public $data_hora;

        /********Início dos métodos sets e gets*********/
        public function setPagamento($forma_pagamento){
            $this->pagamento = $forma_pagamento;
        }
        public function getPagamento(){
            return $this->forma_pagamento;
        }
        public function setData($data_hora){
            $this->data_hora = $data_hora;
        }
        public function getData(){
            return $this->data_hora;
        }

        public function insert($codigo_cliente){
            $sql="INSERT INTO COMPRA(forma_pagamento, fk_cliente_fk_usuario_codigo, data) VALUES(:forma_pagamento, :codigo_cliente, :data_hora)";
            $stmt = Database::prepare($sql);
            $stmt->bindParam(':forma_pagamento', $this->pagamento);
            $stmt->bindParam(':codigo_cliente', $codigo_cliente);
            $stmt->bindParam(':data_hora', $this->data_hora);
            
            return $stmt->execute();
            
        }
    }
?>