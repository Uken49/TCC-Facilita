function validarSenha(){
    var senha = document.getElementById("txSenha").value;
    var confsenha = document.getElementById("txConfirmarSenha").value;
    var avisoSenha = document.getElementById("avisoConfirmarSenha").innerHTML;

    if (confsenha.length >= 6) {
        if(confsenha == senha){
            document.getElementById("classConfirmarSenha").classList.add('ls-success');
            document.getElementById("classConfirmarSenha").classList.remove('ls-error');
            document.getElementById("classConfirmarSenha").classList.remove('ls-warning');
            avisoSenha = document.getElementById("avisoConfirmarSenha").innerHTML = "";
            return true;
        }else{
            document.getElementById("classConfirmarSenha").classList.add('ls-error');
            document.getElementById("classConfirmarSenha").classList.remove('ls-success');
            document.getElementById("classConfirmarSenha").classList.remove('ls-warning');
            avisoSenha = document.getElementById("avisoConfirmarSenha").innerHTML = "Senha incorreta";
            return false;
        }
    }else{
        document.getElementById("classConfirmarSenha").classList.add('ls-warning');
        document.getElementById("classConfirmarSenha").classList.remove('ls-success');
        document.getElementById("classConfirmarSenha").classList.remove('ls-error');
        avisoSenha = document.getElementById("avisoConfirmarSenha").innerHTML = "Senha com menos de 6 digitos";
        return false;
    }
}
