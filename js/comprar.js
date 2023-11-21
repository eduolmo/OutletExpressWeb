var stars = document.querySelectorAll(".star-icon");

document.addEventListener("click", function (e) {
    var clickedElement = e.target;

    // Verifica se o elemento clicado tem a classe 'star-icon'
    if (clickedElement.classList.contains('star-icon')) {
        // Remove a classe 'ativo' de todas as estrelas
        stars.forEach(function (star) {
            star.classList.remove('ativo');
        });

        // Adiciona a classe 'ativo' apenas ao elemento clicado
        clickedElement.classList.add('ativo');
    }
});
