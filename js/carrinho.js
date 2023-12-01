/*Variaveis para os inputs necessarios*/
const inputQtds = document.querySelectorAll('.input-qtd');
const decrementButtons = document.querySelectorAll('.btn-qtd.btn-minus');
const incrementButtons = document.querySelectorAll('.btn-qtd.btn-plus');
const valorUnitarios = document.querySelectorAll('.valor-unitario');
const subtotais = document.querySelectorAll('.subtotal');
const subtotalCompra = document.getElementById('subtotal-compra');
const totalCompra = document.getElementById('total-value');


for (let i = 0; i < inputQtds.length; i++) {
    /*Recebendo a variavel correta a partir do indice da lista*/
    const inputQtd = inputQtds[i];
    const decrementButton = decrementButtons[i];
    const incrementButton = incrementButtons[i];
    const valorUnitario = valorUnitarios[i];
    const subtotal = subtotais[i];

    /*Adicionando a funcionalidade de aumentar o valor ao clicar no botao de soma*/
    decrementButton.addEventListener('click', () => {
      if (inputQtd.value > 1) {
        inputQtd.value = parseInt(inputQtd.value) - 1;
        calcularSubtotal();
      }
    });
    
    /*Adicionana funcionalidade de diminuir o valor ao clicar no botao de subtracao*/
    incrementButton.addEventListener('click', () => {
      inputQtd.value = parseInt(inputQtd.value) + 1;
      calcularSubtotal();
    });
}

/*Funcao de calculo do subtotal*/
function calcularSubtotal() {
  let subtotais = document.querySelectorAll(".subtotal");
  let somaSubtotais = 0;
  
  subtotais.forEach((subtotal, i) => {
    const row = subtotal.closest('.produto-item');
    const qtd = inputQtds[i].value;
    const valor = Number(valorUnitarios[i].innerText.replace('R$', '').trim());
    subtotal.textContent = "R$ " + (valor * qtd).toFixed(2);
    somaSubtotais += Number(subtotal.textContent.replace("R$", "").trim());
  });
  
  subtotalCompra.textContent = "R$ " + somaSubtotais.toFixed(2);
  totalCompra.textContent = "R$ " + (somaSubtotais + 20).toFixed(2);
}

/*Ao abrir o site, os calculos de subtotais serao realizados automaticamente*/
window.addEventListener('load', () => {
    calcularSubtotal();

document.getElementById('btnFinalizarCompra').addEventListener('click', function() {
  window.location.href = 'pedido.php';
});




$('.btn-save').on('click', function() {
  let codigo_cliente = $(this).data('codigo-cliente');
  let codigo_produto = $(this).data('codigo-produto');
  let quantidade = $(this).closest('.produto-item').find('.input-qtd').val();

  console.log('Código Cliente:', codigo_cliente);
  console.log('Código Produto:', codigo_produto);
  console.log('Quantidade:', quantidade);

  $.ajax({
      url: 'item_carrinho.php',
      type: 'POST',
      data: {
          'action': 'update',
          'codigo_produto': codigo_produto,
          'codigo_cliente': codigo_cliente,
          'quantidade': quantidade
      }
  });
});

});
