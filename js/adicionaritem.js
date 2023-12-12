/*
$('.inserirComentario').on('click', function() {
    let codigo_produto = $(this).data('codigo-produto');
    let codigo_cliente = $(this).data('codigo-cliente');
    let conteudo = $('#comentarioInput').val();
    let avaliacao = $('#avaliacaoStars .ativo').data('avaliacao');

    

    $.ajax({
        url: 'inserirComentario.php',
        type: 'POST',
        data: {
            'action': 'inserirComentario',
            'codigo_produto': codigo_produto,
            'codigo_cliente': codigo_cliente,
            'conteudo': conteudo,
            'avaliacao': avaliacao
        }, success: function(response) {
            // Recarrega a página
            location.reload();
        }
    });
});
*/

$('.inserirComentario').on('click', function() {
    let codigo_produto = $(this).data('codigo-produto');
    let codigo_cliente = $(this).data('codigo-cliente');
    let conteudo = $('#comentarioInput').val();
    let avaliacao = $('#avaliacaoStars .ativo').data('avaliacao');

    // Atualiza os valores dos campos ocultos no formulário
    $('#conteudoInput').val(conteudo);
    $('#avaliacaoInput').val(avaliacao);

    // Adiciona a URL atual como um parâmetro para redirecionamento
    $('<input>').attr({
        type: 'hidden',
        name: 'return_url',
        value: window.location.href
    }).appendTo('form');

    // Submete o formulário
    $('form').submit();
});


$('.adicionarCarrinho').on('click', function() {
    let codigo_produto = $(this).data('codigo-produto');
    let codigo_cliente = $(this).data('codigo-cliente');
    let quantidade = parseInt($("#quantidade").val());

    $.ajax({
        url: 'adicionaritem.php',
        type: 'POST',
        data: {
            'action': 'adicionarCarrinho',
            'codigo_produto': codigo_produto,
            'codigo_cliente': codigo_cliente,
            'quantidade': quantidade
        }
    });
});


const inputQtds = document.querySelectorAll('.input-qtd');
const decrementButtons = document.querySelectorAll('.btn-qtd.btn-minus');
const incrementButtons = document.querySelectorAll('.btn-qtd.btn-plus');


for (let i = 0; i < inputQtds.length; i++) {
    /*Recebendo a variavel correta a partir do indice da lista*/
    const inputQtd = inputQtds[i];
    const decrementButton = decrementButtons[i];
    const incrementButton = incrementButtons[i];

    console.log(inputQtds);
    /*Adicionando a funcionalidade de aumentar o valor ao clicar no botao de soma*/
    decrementButton.addEventListener('click', () => {
        if (inputQtd.value > 1) {
        inputQtds[0].value = parseInt(inputQtds[0].value) - 1;
        inputQtds[1].value = parseInt(inputQtds[1].value) - 1;
        }
    });

    /*Adicionana funcionalidade de diminuir o valor ao clicar no botao de subtracao*/
    incrementButton.addEventListener('click', () => {
        inputQtds[0].value = parseInt(inputQtds[0].value) + 1;
        inputQtds[1].value = parseInt(inputQtds[1].value) + 1;
    });
}