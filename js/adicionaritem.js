$(document).ready(function() {
    // Quando o botão for clicado
    $("#btnAdicionarCarrinho").click(function() {
        // Recupere a quantidade definida pelo usuário
        var quantidade = parseInt($("#quantidadeProduto").val());

        // Verifique se a quantidade é válida
        if (isNaN(quantidade) || quantidade <= 0) {
            alert("Por favor, insira uma quantidade válida.");
            return;
        }

        // Crie um objeto com os dados a serem enviados para o servidor
        var dados = {
            quantidade: quantidade
            // Adicione outras informações necessárias aqui
        };

        // Faça uma requisição Ajax para o servidor
        $.ajax({
            type: "POST",
            url: "caminho/para/seu/script_php.php", // Substitua pelo caminho correto do seu script PHP
            data: dados,
            success: function(response) {
                // A resposta do servidor (pode ser usada para feedback ao usuário)
                console.log(response);

                // Redirecione para a página do carrinho após a inserção (opcional)
                window.location.href = 'carrinho.php';
            },
            error: function(error) {
                // Trate erros aqui, se necessário
                console.error(error);
            }
        });
    });
});