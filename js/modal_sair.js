const abrirModalBotao_sair = document.querySelector("#abrir_modal_sair");
const modal_sair = document.querySelector("#modal_sair");
const fade_sair = document.querySelector("#fade_sair");

const toggleModalSair = () => {
    modal_sair.classList.toggle("hide_sair");
    fade_sair.classList.toggle("hide_sair");
}

[abrirModalBotao_sair, fade_sair].forEach((el) => {
    el.addEventListener("click", () => toggleModalSair());
    console.log('clicou');
});
