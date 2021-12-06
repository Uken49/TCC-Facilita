<?php
    include_once("valida-sentinela.php");
    if (!empty($_POST['txNome']) || !empty($_POST['txTelefone']) || !empty($_POST['txDtNascimento'])
        || !empty($_POST['txEmail'])|| !empty($_POST['txCpf']) || !empty($_POST['txCep'])
        || !empty($_POST['txLogradouro']) || !empty($_POST['txBairro']) || !empty($_POST['txCidade'])
        || !empty($_POST['txUf']) || !empty($_POST['txSenha']) || !empty($_POST['txConfirmarSenha'])
        || !empty($_FILES['imagem']) || !empty($_POST['txCnpj']) || !empty($_POST['txComplemento'])
        || !empty($_POST['txBiografia'])) {
        
        function limpar_texto($str){ 
            return preg_replace("/[^0-9]/", "", $str); 
        }

        !empty($_POST['txNome']) ? $nome = $_POST['txNome'] : $nome = $_SESSION['nome'];
        !empty($_POST['txTelefone']) ? $telefone = $_POST['txTelefone'] : $telefone = $_SESSION['telefone'];
        !empty($_POST['txCnpj']) ? $cnpj = $_POST['txCnpj'] : $cnpj = $_SESSION['cnpj'];
        !empty($_POST['txCpf']) ? $cpf = $_POST['txCpf'] : $cpf = $_SESSION['cpf'];
        !empty($_POST['txCep']) ? $cep = $_POST['txCep'] : $cep = $_SESSION['cep'];
        !empty($_POST['txLogradouro']) ? $logradouro = $_POST['txLogradouro'] : $logradouro = $_SESSION['logradouro'];
        !empty($_POST['txBairro']) ? $bairro = $_POST['txBairro'] : $bairro = $_SESSION['bairro'];
        !empty($_POST['txCidade']) ? $cidade = $_POST['txCidade'] : $cidade = $_SESSION['cidade'];
        !empty($_POST['txUf']) ? $uf = $_POST['txUf'] : $uf = $_SESSION['uf'];
        !empty($_POST['txComplemento']) ? $complemento = $_POST['txComplemento'] : $complemento = $_SESSION['endComplemento'];
        !empty($_POST['txDtNascimento']) ? $dtNasci = $_POST['txDtNascimento'] : $dtNasci = $_SESSION['dataNascimento'];
        !empty($_POST['txBiografia']) ? $biografia = $_POST['txBiografia'] : $biografia = $_SESSION['biografia'];

        if (isset($_FILES['imagem'])) {
            header('Location: ../area-restrita/perfil.php');
            $contratante->nomeimagem = $_FILES['imagem']['name'];
            $arquivo = $_FILES['imagem']['tmp_name'];
            $contratante->caminhoimagem = "../img/perfil/";

            move_uploaded_file(
                $arquivo,
                $contratante->caminhoimagem . $contratante->nomeimagem
            );

            $contratante->caminhoimagem = $contratante->caminhoimagem . $contratante->nomeimagem;
        } else {
            header('Location: ../area-restrita/minha-conta.php');
            $contratante->caminhoimagem = $_SESSION['fotoPerfil'];
        }
        $contratante->setNome($nome);
        $contratante->setCnpj(limpar_texto($cnpj));
        $contratante->setCpf(limpar_texto($cpf));
        $contratante->setCep(limpar_texto($cep));
        $contratante->setLogradouro($logradouro);
        $contratante->setBairro($bairro);
        $contratante->setCidade($cidade);
        $contratante->setUf($uf);
        $contratante->setComplementoEndereco($complemento);
        $contratante->setDataNascimento(limpar_texto($dtNasci));
        $contratante->setBiografia($biografia);
        $contratante->setIdContratante($_SESSION['idTipoCadastro']);
        echo $contratante->atualizarDados($contratante);
    } else {
        header('Location: ../area-restrita/minha-conta.php');
    }
?>