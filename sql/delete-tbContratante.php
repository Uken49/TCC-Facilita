<?php
    include_once('global.php');
    $conexao = Conexao::pegarConexao();
    $contratante = new Contratante();

    $contratante->setIdContratante($_SESSION['idTipoCadastro']);
    $contratante->setIdUsuario($_SESSION['idUsuario']);

    $contratante->excluirConta($contratante);
?>