function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        //Atualiza os campos com os valores.
        document.getElementById('txLogradouro').value = (conteudo.logradouro);
        document.getElementById('txBairro').value = (conteudo.bairro);
        document.getElementById('txCidade').value = (conteudo.localidade);
        document.getElementById('txUf').value = (conteudo.uf);
        
        document.getElementById("classCep").classList.add('ls-success');
        document.getElementById("classCep").classList.remove('ls-warning');
        document.getElementById("classCep").classList.remove('ls-error');
        avisoCep = document.getElementById("avisoCep").innerHTML = "";
    } //end if.
    else {
        //CEP não Encontrado.
        document.getElementById("classCep").classList.add('ls-warning');
        document.getElementById("classCep").classList.remove('ls-error');
        document.getElementById("classCep").classList.remove('ls-success');
        avisoCep = document.getElementById("avisoCep").innerHTML = "Cep não encotrado";
    }
}

function pesquisacep(valor) {

    //Nova variável "cep" somente com dígitos.
    var cep = valor.replace(/\D/g, '');
    var avisoCep = document.getElementById("avisoCep").innerHTML;

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('txLogradouro').value = "...";
            document.getElementById('txBairro').value = "...";
            document.getElementById('txCidade').value = "...";
            document.getElementById('txUf').value = "...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);

        } //end if.
        else {
            //cep é inválido.
            
            document.getElementById("classCep").classList.add('ls-error');
            document.getElementById("classCep").classList.remove('ls-warning');
            document.getElementById("classCep").classList.remove('ls-success');
            avisoCep = document.getElementById("avisoCep").innerHTML = "Cep inválido";
        }
    } //end if.
    else {
        
        document.getElementById("classCep").classList.add('ls-warning');
        document.getElementById("classCep").classList.remove('ls-error');
        document.getElementById("classCep").classList.remove('ls-success');
        avisoCep = document.getElementById("avisoCep").innerHTML = "Campo vazio";
        //cep sem valor, limpa formulário.
        
    }
};