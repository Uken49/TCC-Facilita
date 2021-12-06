<?php
    include_once('global.php');
    $conexao = Conexao::pegarConexao();
    $profissional = new Profissional();

    $profissional->setIdProfissional($_SESSION['idTipoCadastro']);
    $profissional->setIdUsuario($_SESSION['idUsuario']);

    $profissional->excluirConta($profissional);
?>