<?php

    //Carregar as classes automáticamente
    spl_autoload_register('carregarClasse');

    function carregarClasse($nomeClasse)
    {
        if (file_exists('../classes/'.$nomeClasse.'.php')){
            include_once ('../classes/'. $nomeClasse.'.php');
        }
    }
?>