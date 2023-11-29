const abrirModalBotao_nome = document.querySelector("#abrir_modal_nome");
const modal_nome = document.querySelector("#modal_nome");
const fade_nome = document.querySelector("#fade_nome");

const toggleModalNome = () => {
    modal_nome.classList.toggle("hide_nome");
    fade_nome.classList.toggle("hide_nome");
}

[abrirModalBotao_nome, fade_nome].forEach((el) => {
    el.addEventListener("click", () => toggleModalNome());
    console.log('clicou');
});
