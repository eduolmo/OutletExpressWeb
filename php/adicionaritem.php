<?php
// Código PHP para lidar com a inserção/atualização do item_carrinho
//error_reporting(0);
session_start();
// Inclui o arquivo da sua classe


// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'  && $_POST['action'] === 'adicionarCarrinho') {
    // Cria uma instância da classe item_carrinho

    include 'item_carrinho.php';

    // Obtem o codigo do cliente da sessao
    $codigo_produto = $_POST['codigo_produto'];
    $codigo_cliente = $_POST['codigo_cliente'];
    $quantidade = $_POST['quantidade'];

    /*
    $sql = "
    SELECT p.codigo as produto_codigo
    FROM item_carrinho ic
    JOIN produto p ON ic.fk_PRODUTO_codigo = p.codigo
    JOIN cliente c ON ic.fk_CLIENTE_FK_USUARIO_codigo = c.fk_USUARIO_codigo
    WHERE c.fk_USUARIO_codigo = :codigo_cliente
    ";

    $listacarrinho = $db->prepare($sql);
    $listacarrinho->bindParam(':codigo_cliente', $codigo_cliente, PDO::PARAM_INT);
    $listacarrinho->execute();
    
    $valor = $listacarrinho->fetch(PDO::FETCH_ASSOC);

    */

    $itemCarrinho = new itemCarrinho();
    // Atribui a quantidade ao objeto
    $itemCarrinho->setQuantidade($_POST['quantidade']);
    $itemCarrinho->setFk_CLIENTE_FK_USUARIO_codigo($codigo_cliente);
    $itemCarrinho->setFk_PRODUTO_codigo($codigo_produto);


    // Verifique se o produto já está no carrinho (baseado em alguma chave única)
    // Substitua 'sua_chave_unica' pelo campo correto que você deseja verificar na tabela item_carrinho
    
    $produtoJaNoCarrinho = $itemCarrinho->verificarProdutoNoCarrinho($codigo_produto, $codigo_cliente);

    if ($produtoJaNoCarrinho) {
        // Se o produto já está no carrinho, atualize a quantidade
        $itemCarrinho->updatePlus($codigo_produto, $codigo_cliente, $quantidade);
        echo "Produto atualizado no carrinho com sucesso!";
    } else {
        // Se o produto ainda não está no carrinho, insira-o
        if ($itemCarrinho->insert()) {
            echo "Produto adicionado ao carrinho com sucesso!";
        } else {
            echo "Erro ao adicionar o produto ao carrinho.";
        }
    }
}
?>
