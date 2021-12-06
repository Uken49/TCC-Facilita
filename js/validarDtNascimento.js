function validarDtNascimento() {
    var dtNascimento = document.getElementById("txDtNascimento").value;
    dtNascimento = numeroTelefone.replace(/[^\d]+/g, '');

    if (dtNascimento > 0) {
        document.getElementById("classDtNascimento").classList.add('ls-success');
        document.getElementById("classDtNascimento").classList.remove('ls-error');
        document.getElementById("classDtNascimento").classList.remove('ls-warning');
        avisoEmail = document.getElementById("avisoDtNacismento").innerHTML = "";
        return true;
    } else {
        document.getElementById("classDtNascimento").classList.add('ls-error');
        document.getElementById("classDtNascimento").classList.remove('ls-success');
        document.getElementById("classDtNascimento").classList.remove('ls-warning');
        avisoEmail = document.getElementById("avisoDtNacismento").innerHTML = "Campo vazio";
        return false;
    }
}