<?php
try {
    include_once('global.php');
    $conexao = Conexao::pegarConexao();
    if (!isset($_SESSION['idUsuario']) && empty($_SESSION['idUsuario'])) {
        header('Location: ../index.php');
        exit;
    } else {
        $_SESSION['Call'] = 0;
        $usuario = new Usuario();
        $contratante = new Contratante();
        $profissional = new Profissional();

        $listaUsuario = $usuario->listarUsuario();
        $listaContratante = $contratante->listarDadosContratante();
        $listaProfissional = $profissional->listarDadosProfissional();
        $listaContatoUsuario = $usuario->listarContato($idUsuario = $_SESSION['idUsuario']);
        $listaUsuarioChat = $usuario->listarContato($UsuarioChat = ($_SESSION['Call'] == '' ? '0' : $_SESSION['Call']), $idUsuario = $_SESSION['idUsuario']);

        //Variaveis do banco trabalhadas dentro do sistema
        foreach ($listaUsuario as $linha) {
            if ($_SESSION['idUsuario'] == $linha['idUsuario']) {
                $_SESSION['email'] = $linha['email'];
                $_SESSION['senha'] = $linha['senha'];
            }
        }
        foreach ($listaContratante as $linha) {
            if ($_SESSION['idUsuario'] == $linha['idUsuario']) {
                $_SESSION['nome'] = $linha['nomeContratante'];
                $_SESSION['cnpj'] = $linha['cnpjContratante'];
                $_SESSION['cpf'] = $linha['cpfContratante'];
                $_SESSION['cep'] = $linha['cepContratante'];
                $_SESSION['logradouro'] = $linha['logradouroContratante'];
                $_SESSION['bairro'] = $linha['bairroContratante'];
                $_SESSION['cidade'] = $linha['cidadeContratante'];
                $_SESSION['uf'] = $linha['ufContratante'];
                $_SESSION['endComplemento'] = $linha['complementoContratante'];
                $_SESSION['fotoPerfil'] = $linha['fotoPerfil'];
                $_SESSION['biografia'] = $linha['biografia'];
                $_SESSION['dataNascimento'] = $linha['dataNascimento'];
                $_SESSION['statusPerfil'] = $linha['statusPerfil'];
                $_SESSION['telefone'] = $linha['descTelContratante'];
                $_SESSION['tipoCadastro'] = 'Contratante';
                $_SESSION['idTipoCadastro'] = $linha['idContratante'];
            }
        }
        foreach ($listaProfissional as $linha) {
            if ($_SESSION['idUsuario'] == $linha['idUsuario']) {
                $_SESSION['nome'] = $linha['nomeProfissional'];
                $_SESSION['rg'] = $linha['rgProfissional'];
                $_SESSION['cpf'] = $linha['cpfProfissional'];
                $_SESSION['cep'] = $linha['cepProfissional'];
                $_SESSION['logradouro'] = $linha['logradouroProfissional'];
                $_SESSION['bairro'] = $linha['bairroProfissional'];
                $_SESSION['cidade'] = $linha['cidadeProfissional'];
                $_SESSION['uf'] = $linha['ufProfissional'];
                $_SESSION['endComplemento'] = $linha['complementoProfissional'];
                $_SESSION['fotoPerfil'] = $linha['fotoPerfil'];
                $_SESSION['biografia'] = $linha['biografia'];
                $_SESSION['dataNascimento'] = $linha['dataNascimento'];
                $_SESSION['statusPerfil'] = $linha['statusPerfil'];
                $_SESSION['telefone'] = $linha['descTelProfissional'];
                $_SESSION['tipoCadastro'] = 'Profissional';
                $_SESSION['idTipoCadastro'] = $linha['idProfissional'];
            }
        }
    }
} catch (Exception $e) {
    echo '<pre>';
    print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
