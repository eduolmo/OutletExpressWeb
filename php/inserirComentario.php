<?php
// Código PHP para lidar com a inserção/atualização do item_carrinho
//error_reporting(0);
session_start();
// Inclui o arquivo da sua classe


// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST'  && $_POST['action'] === 'inserirComentario') {
    // Cria uma instância da classe item_carrinho

    include 'comentario.php';

    // Obtem o codigo do cliente da sessao
    $codigo_produto = $_POST['codigo_produto'];
    $codigo_cliente = $_POST['codigo_cliente'];
    $conteudo = $_POST['conteudo'];
    $avaliacao = $_POST['avaliacao'];

    $comentario = new comentario();
    // Atribui a quantidade ao objeto
    $comentario->setConteudo($conteudo);
    $comentario->setAvaliacao($avaliacao);
    $comentario->setFk_CLIENTE_FK_USUARIO_codigo($codigo_cliente);
    $comentario->setFk_PRODUTO_codigo($codigo_produto);


    // Verifique se o produto já está no carrinho (baseado em alguma chave única)
    // Substitua 'sua_chave_unica' pelo campo correto que você deseja verificar na tabela item_carrinho
    
    $comentarioJaExiste = $comentario->verificarComentario($codigo_produto, $codigo_cliente);

    if ($comentarioJaExiste) {
        // Se o produto já está no carrinho, atualize a quantidade
        echo "Você já comentou nesse produto!";
    } else {
        // Se o produto ainda não está no carrinho, insira-o
        if ($comentario->insert()) {
            echo "Comentario inserido com sucesso!";
        } else {
            echo "Erro ao inserir comentario.";
        }
    }
}
?>
