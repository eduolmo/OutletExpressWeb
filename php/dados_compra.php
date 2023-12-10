<?php
    require_once 'crud.php';

    $cep = trim(filter_input(INPUT_POST,'cep',FILTER_SANITIZE_SPECIAL_CHARS));
    $rua = trim(filter_input(INPUT_POST,'logradouro',FILTER_SANITIZE_SPECIAL_CHARS));
    $numero = trim(filter_input(INPUT_POST,'numero',FILTER_SANITIZE_SPECIAL_CHARS));
    $cpf = trim(filter_input(INPUT_POST,'cpf',FILTER_SANITIZE_SPECIAL_CHARS));
    $pagamento = $_POST['opcao'];

    $endereco = "INSERT INTO ENDERECO(numero, cep, nome_logradouro, fk_tipo_logradouro_codigo, fk_pais_codigo) VALUES(:numero, :cep, :rua, 1, 1)";
    $insere_endereco = Database::prepare($endereco);
    $insere_endereco->bindParam(':numero', $numero, PDO::PARAM_INT);
    $insere_endereco->bindParam(':cep', $cep);
    $insere_endereco->bindParam(':rua', $rua);
    
    if($insere_endereco->execute()){

        $consulta_end = "SELECT codigo FROM ENDERECO WHERE numero = :numero AND cep = :cep AND nome_logradouro = :nome_logradouro";
        $consulta_endereco = Database::prepare($consulta_end);
        // Substitua os marcadores de posição pelos valores reais
        $consulta_endereco->bindParam(':numero', $numero);
        $consulta_endereco->bindParam(':cep', $cep);
        $consulta_endereco->bindParam(':nome_logradouro', $rua);
        $consulta_endereco->execute();
        $lista_endereco = $consulta_endereco->fetch(PDO::FETCH_ASSOC);
        $codigo_endereco = $lista_endereco["codigo"];
        
        $busca_cli = "SELECT fk_usuario_codigo FROM CLIENTE WHERE fk_usuario_codigo = :codigo_cliente";
        $busca_cliente = Database::prepare($busca_cli);
        $busca_cliente->bindParam(':codigo_cliente', $codigo_cliente);
        if($busca_cliente->execute()){

            if(!$busca_cliente->rowCount() > 0){
                $endereco_cli = "INSERT INTO CLIENTE(cpf, fk_usuario_codigo, fk_endereco_codigo) VALUES(:cpf, :codigo_cliente, :codigo_endereco)";
                $endereco_cliente = Database::prepare($endereco_cli);
                // Substitua os marcadores de posição pelos valores reais
                $endereco_cliente->bindParam(':cpf', $cpf);
                $endereco_cliente->bindParam(':codigo_cliente', $codigo_cliente);
                $endereco_cliente->bindParam(':codigo_endereco', $codigo_endereco);
                $endereco_cliente->execute();

            }
        }
        
        // Consulta a data e hora atual com fuso horário do Brasil

        $data = "SELECT CURRENT_TIMESTAMP AT TIME ZONE 'America/Sao_Paulo' AS data_hora_brasil";
        $consulta_data = Database::prepare($data);
        $consulta_data->execute();
        $resposta_data = $consulta_data->fetch(PDO::FETCH_ASSOC);
        $data_hora = $resposta_data["data_hora_brasil"];
    }
?>