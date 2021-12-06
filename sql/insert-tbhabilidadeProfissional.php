<?php
    include_once ('global.php');
    $profissional = new Profissional();
    $habilidade = new Habilidade();
    $listaProfissional = $profissional->listarDadosProfissional();
    $listaHabilidade = $habilidade->listarHabilidade();
    $listaHabProfissional = $habilidade->listarHabDoProfissional();

    foreach ($listaProfissional as $linha) {
        if ($_SESSION['idUsuario'] == $linha['idUsuario']) {
            $idProfissional = $linha['idProfissional'];
        }
    }
    header('Location: ../area-restrita/index.php#primeiroAcesso');
    
    //Checando quais checkbox foram selecionadas
    if (isset($_POST['habilidade'])) {
        $listaCheckbox = $_POST['habilidade'];

        foreach ($listaCheckbox as $idhabilidade) {
            //Cadastrar a habilidade do profissional
            $habilidade->setIdHabilidade($idhabilidade);
            $habilidade->setIdProfissional($idProfissional);
            echo $habilidade->cadastrarHabDoProfissional($habilidade);
        }
    }
?>