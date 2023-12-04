$('.btn-finalizar').on('click', function() {
    let codigo_cliente = $(this).data('codigo-cliente');

    $.ajax({
        url: 'item_carrinho.php',
        type: 'POST',
        data: {
            'action': 'delete',
            'codigo_cliente': codigo_cliente
        }
    });
});
