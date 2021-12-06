function validarTelefone() {
    var numeroTelefone = document.getElementById('txTelefone').value;
    numeroTelefone = numeroTelefone.replace(/[^\d]+/g, '');
    var avisoTelefone = document.getElementById("avisoTelefone").innerHTML;
    
    if (!numeroTelefone == "") {
        if (numeroTelefone.length == 10 || numeroTelefone.length == 11) {
            document.getElementById("classTelefone").classList.add('ls-success');
            document.getElementById("classTelefone").classList.remove('ls-error');
            document.getElementById("classTelefone").classList.remove('ls-warning');
            avisoTelefone = document.getElementById("avisoTelefone").innerHTML = "";
            return true;
        }else {
            document.getElementById("classTelefone").classList.add('ls-error');
            document.getElementById("classTelefone").classList.remove('ls-success');
            document.getElementById("classTelefone").classList.remove('ls-warning');
            avisoTelefone = document.getElementById("avisoTelefone").innerHTML = "Telefone inválido";
            return false;
        }
    }else{
        document.getElementById("classTelefone").classList.add('ls-warning');
        document.getElementById("classTelefone").classList.remove('ls-success');
        document.getElementById("classTelefone").classList.remove('ls-error');
        avisoTelefone = document.getElementById("avisoTelefone").innerHTML = "Campo vazio";
        return false;
    }
}
