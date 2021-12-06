function validarCadastro() {
    if (validarCep() && validarCpf() && validarSenha() && validarDtNascimento() && validarTelefone() && validarEmail()
        && validarNome()) {

        alert("Dados enviados com Sucesso!!");
        return true;
    }
    else {
        alert("Erro ao enviar!!");
        return false;
    }
}