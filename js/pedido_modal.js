const abrirModalBotao = document.querySelector("#abrir_modal");
const modal = document.querySelector("#modal");
const fade = document.querySelector("#fade");

const toggleModal = () => {
    modal.classList.toggle("hide");
    fade.classList.toggle("hide");
}

[abrirModalBotao, fade].forEach((el) => {
    el.addEventListener("click", () => toggleModal())
});