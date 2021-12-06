function validarNome() {
    var nome = document.getElementById("txNome").value;

    if (nome.length > 0) {
        document.getElementById("classNome").classList.add('ls-success');
        document.getElementById("classNome").classList.remove('ls-error');
        document.getElementById("classNome").classList.remove('ls-warning');
        avisoNome = document.getElementById("avisoNome").innerHTML = "";
        return true;
    } else {
        document.getElementById("classNome").classList.add('ls-error');
        document.getElementById("classNome").classList.remove('ls-success');
        document.getElementById("classNome").classList.remove('ls-warning');
        avisoNome = document.getElementById("avisoNome").innerHTML = "Campo vazio";
        return false;
    }
}