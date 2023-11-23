<?php
// Código PHP para lidar com a inserção/atualização do item_carrinho

// Inclui o arquivo da sua classe
require_once 'item_carrinho.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Cria uma instância da classe item_carrinho
    $itemCarrinho = new item_carrinho();

    // Atribui a quantidade ao objeto
    $itemCarrinho->setid($_POST['quantidade']);

    // Falta adicionar as foreign keys

    // Verifique se o produto já está no carrinho (baseado em alguma chave única)
    // Substitua 'sua_chave_unica' pelo campo correto que você deseja verificar na tabela item_carrinho
    
    $produtoJaNoCarrinho = $itemCarrinho->verificarProdutoNoCarrinho($_POST['sua_chave_unica']);

    if ($produtoJaNoCarrinho) {
        // Se o produto já está no carrinho, atualize a quantidade
        $itemCarrinho->atualizarQuantidadeNoCarrinho($_POST['sua_chave_unica'], $_POST['quantidade']);
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
