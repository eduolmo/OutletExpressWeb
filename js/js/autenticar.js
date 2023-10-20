//selecionando o botao de entrar
var entrar = document.getElementById("entrar")
entrar.addEventListener("click",autenticar)
entrar.style.textAlign = "center"

//selecionando o paragrafo do aviso
var aviso = document.getElementById("aviso")


function autenticar() {
    var inputs = document.querySelectorAll(".txtinput")
    console.log(inputs)
    //conferindo se os campos estão vazios
    let count = 0
    for (i = 0; i < inputs.length; i++){
        if (inputs[i].value != ""){
            count++
        }
    }
    if(count == inputs.length){
        aviso.style.display = "none"
    }
    else{
        aviso.style.display = "block"
    }

}