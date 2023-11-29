const abrirModalBotao = document.querySelector("#abrir_modal_senha");
const modal = document.querySelector("#modal_senha");
const fade = document.querySelector("#fade_senha");

const toggleModal = () => {
    modal.classList.toggle("hide_senha");
    fade.classList.toggle("hide_senha");
}

[abrirModalBotao, fade].forEach((el) => {
    el.addEventListener("click", () => toggleModal())
    console.log('clicou')
});