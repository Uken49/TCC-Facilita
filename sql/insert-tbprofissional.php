<?php
    include_once ('global.php');
    //Cadastrar o profissional
    if (!empty($_POST['txNome']) && !empty($_POST['txTelefone']) && !empty($_POST['txDtNascimento'])
        && !empty($_POST['txEmail']) && !empty($_POST['txRg']) && !empty($_POST['txCpf'])
        && !empty($_POST['txCep']) && !empty($_POST['txLogradouro']) && !empty($_POST['txBairro'])
        && !empty($_POST['txCidade']) && !empty($_POST['txUf']) && !empty($_POST['txSenha'])
        && !empty($_POST['txConfirmarSenha'])) {

        header('Location: ../cadastro-profissional-2.php');
        
        function limpar_texto($str){ 
            return preg_replace("/[^0-9]/", "", $str); 
        }
        //-----------------Cadastrando os dados-----------------//
        
        $profissional = new Profissional();

        //Cadastrar o profissional
        $arquivo = 'padrao.png';
        $profissional->caminhoimagem = "../img/perfil/padrao.png";

        move_uploaded_file(
            $arquivo,
            $profissional->caminhoimagem . $profissional->nomeimagem
        );
        $profissional->caminhoimagem = $profissional->caminhoimagem ;
        $profissional->setEmail($_POST['txEmail']);
        $profissional->setSenha($_POST['txSenha']);
        $profissional->setNome($_POST['txNome']);
        $profissional->setRg(limpar_texto($_POST['txRg']));
        $profissional->setDataNascimento($_POST['txDtNascimento']);
        $profissional->setCpf(limpar_texto($_POST['txCpf']));
        $profissional->setCep(limpar_texto($_POST['txCep']));
        $profissional->setLogradouro($_POST['txLogradouro']);
        $profissional->setBairro($_POST['txBairro']);
        $profissional->setCidade($_POST['txCidade']);
        $profissional->setUf($_POST['txUf']);
        $profissional->setComplementoEndereco($_POST['txComplementoEndereco']);
        $profissional->setStatusPerfil(1);
        $profissional->setTelefone(limpar_texto($_POST['txTelefone']));
        echo $profissional->cadastrarProfissional($profissional);
    }else{
        header('Location: ../cadastro-profissional.php');
    }
?>