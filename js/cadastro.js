function autenticar(e) {
    e.preventDefault()

    let senha = document.getElementById("senha")
    //contando os valores da senha
    let s = senha.value.length
    console.log(s)

    if (s < 6 || s > 30) {
        senha.style.borderColor = "red"
        document.getElementById('texto').innerHTML = 'Senha deve ter entre 6 a 30 caracteres';
        texto.style.fontSize = "12px"
    } else {
        senha.style.borderColor = '#390099';
        document.getElementById('texto').style.display =  'none'
    }

    //#aviso
    let aviso = document.getElementById("aviso")
    let inputs = document.querySelectorAll(".txtinput")
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

    // validacao e sanitizacao
    let nome = document.getElementById('nome')
    let email = document.getElementById('email')
    let formulario = document.getElementById('formulario');
        
    sanitizedName = nome.replace(/[^a-zA-ZÀ-ÿ\s\-]/ug, '')

    if (sanitizedName !== nome){
        alert("O nome está incorreto! o certo é: " + sanitizedName)
        return false
    }


    var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/

    if (regex.test(email)) {
        alert("O email é válido.");
        formulario.submit()
        return true
    } else {
        alert("O email não é válido.");
        return false
    }

}