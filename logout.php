<?php
    include_once('global.php');
    $conexao = Conexao::pegarConexao();
    $usuario = new Usuario();
    $usuario->logout();
?>