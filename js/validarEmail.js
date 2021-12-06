function validarEmail() {
    var email = document.getElementById("txEmail").value;
    if (email.length > 0) {
        //Aqui deveria verificar se tem "@" e "."
        if (email == '@' ) {
            //Se o email não existe ele cadastra (pendente)
            if (emailExiste == 0) {
                document.getElementById("classEmail").classList.add('ls-success');
                document.getElementById("classEmail").classList.remove('ls-error');
                document.getElementById("classEmail").classList.remove('ls-warning');
                avisoEmail = document.getElementById("avisoEmail").innerHTML = "";
                return true;
            }else{
                //Se o email não existe ele NÃO cadastra (pendente)
                document.getElementById("classEmail").classList.add('ls-success');
                document.getElementById("classEmail").classList.remove('ls-error');
                document.getElementById("classEmail").classList.remove('ls-warning');
                avisoEmail = document.getElementById("avisoEmail").innerHTML = "";
                return true;
            }
            
        }else{
            document.getElementById("classEmail").classList.add('ls-error');
            document.getElementById("classEmail").classList.remove('ls-success');
            document.getElementById("classEmail").classList.remove('ls-warning');
            avisoEmail = document.getElementById("avisoEmail").innerHTML = "Email inválido";
            return false;
        }
    } else {
        document.getElementById("classEmail").classList.add('ls-error');
        document.getElementById("classEmail").classList.remove('ls-success');
        document.getElementById("classEmail").classList.remove('ls-warning');
        avisoEmail = document.getElementById("avisoEmail").innerHTML = "Campo vazio";
        return false;
    }
}