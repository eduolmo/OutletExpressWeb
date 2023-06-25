function autenticar() {
    var senha = document.getElementById("senha");
    //contando os valores da senha
    let s = senha.value.length;
    console.log(s)

    if (s == 0) {
        senha.style.borderColor = "red"
        document.getElementById('texto').innerHTML = 'Senha deve ter entre 6 a 30 caracteres';
        texto.style.fontSize = "12px"
    } else {
        senha.style.borderColor = '#390099';
        document.getElementById('texto').style.display =  'none'
    }
    //uma senha entre 6 a 30 caracteres
    if (s > 6 && s < 30) {
        senha.style.borderColor = '#390099';
        document.getElementById('texto').style.display =  'none'

    } else {
        senha.style.borderColor = 'red';
        document.getElementById('texto').innerHTML = 'Senha deve ter entre 6 a 30 caracteres'
}

}