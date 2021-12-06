function validarCPF(strCPF) {
    var strCPF = document.getElementById('txCpf').value;
    var avisoCpf = document.getElementById("avisoCpf").innerHTML;
    var Soma;
    var Resto;
    strCPF = strCPF.replace(/[^\d]+/g, '');
    Soma = 0;

    if(strCPF == ''){
        document.getElementById("classCpf").classList.add('ls-warning');
        document.getElementById("classCpf").classList.remove('ls-success');
        document.getElementById("classCpf").classList.remove('ls-error');
        avisoCpf = document.getElementById("avisoCpf").innerHTML = "Campo vazio";
        return false;
    }
    if (strCPF == "00000000000" ||
        strCPF == "11111111111" ||
        strCPF == "22222222222" ||
        strCPF == "33333333333" ||
        strCPF == "44444444444" ||
        strCPF == "55555555555" ||
        strCPF == "66666666666" ||
        strCPF == "77777777777" ||
        strCPF == "88888888888" ||
        strCPF == "99999999999"){
        document.getElementById("classCpf").classList.add('ls-error');
        document.getElementById("classCpf").classList.remove('ls-success');
        document.getElementById("classCpf").classList.remove('ls-warning');
        avisoCpf = document.getElementById("avisoCpf").innerHTML = "Cpf inválido";
        return false;
    } 

    for (i=1; i<=9; i++) {Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
    }

    if ((Resto == 10) || (Resto == 11))  {
        Resto = 0;
    }

    if (Resto != parseInt(strCPF.substring(9, 10)) ){
        document.getElementById("classCpf").classList.add('ls-error');
        document.getElementById("classCpf").classList.remove('ls-success');
        document.getElementById("classCpf").classList.remove('ls-warning');
        avisoCpf = document.getElementById("avisoCpf").innerHTML = "Cpf inválido";
        return false;
    } 

    Soma = 0;
    for (i = 1; i <= 10; i++) {
        Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
    }

    if ((Resto == 10) || (Resto == 11)){
        Resto = 0;
    }  
    if (Resto != parseInt(strCPF.substring(10, 11) ) ){
        document.getElementById("classCpf").classList.add('ls-error');
        document.getElementById("classCpf").classList.remove('ls-success');
        document.getElementById("classCpf").classList.remove('ls-warning');
        avisoCpf = document.getElementById("avisoCpf").innerHTML = "Cpf inválido";
        return false;
    }else{
        document.getElementById("classCpf").classList.add('ls-success');
        document.getElementById("classCpf").classList.remove('ls-error');
        document.getElementById("classCpf").classList.remove('ls-warning');
        avisoCpf = document.getElementById("avisoCpf").innerHTML = "";
        return true;
    }
}