<?php
    include_once ('global.php');
    //Cadastrar o contratante
    if (!empty($_POST['txNome']) && !empty($_POST['txTelefone']) && !empty($_POST['txDtNascimento'])
        && !empty($_POST['txEmail'])&& !empty($_POST['txCpf']) && !empty($_POST['txCep'])
        && !empty($_POST['txLogradouro']) && !empty($_POST['txBairro']) && !empty($_POST['txCidade'])
        && !empty($_POST['txUf']) && !empty($_POST['txSenha']) && !empty($_POST['txConfirmarSenha'])) {
            
        header('Location: ../area-restrita/index2.php#primeiroAcesso');
        $_SESSION['primeiroAcesso'] = 1;
        
        function limpar_texto($str){ 
            return preg_replace("/[^0-9]/", "", $str); 
        }
        //-----------------Cadastrando os dados-----------------//

        $contratante = new Contratante();

        //Cadastrar o contratante
        $arquivo = 'padrao.png';
        $contratante->caminhoimagem = "../img/perfil/padrao.png";

        move_uploaded_file(
            $arquivo,
            $contratante->caminhoimagem . $contratante->nomeimagem
        );
        $contratante->caminhoimagem = $contratante->caminhoimagem ;
        $contratante->setEmail($_POST['txEmail']);
        $contratante->setSenha($_POST['txSenha']);
        $contratante->setNome($_POST['txNome']);
        $contratante->setCnpj(limpar_texto($_POST['txCnpj']));
        $contratante->setDataNascimento($_POST['txDtNascimento']);
        $contratante->setCpf(limpar_texto($_POST['txCpf']));
        $contratante->setCep(limpar_texto($_POST['txCep']));
        $contratante->setLogradouro($_POST['txLogradouro']);
        $contratante->setBairro($_POST['txBairro']);
        $contratante->setCidade($_POST['txCidade']);
        $contratante->setUf($_POST['txUf']);
        $contratante->setComplementoEndereco($_POST['txComplementoEndereco']);
        $contratante->setStatusPerfil(1);
        $contratante ->setTelefone(limpar_texto($_POST['txTelefone']));
        echo $contratante->cadastrarContratante($contratante);
    }else{
        header('Location: ../cadastro-contratante.php');
    }
?>