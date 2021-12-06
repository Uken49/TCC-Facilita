<?php
    include_once ('global.php');
    $habilidade = new Habilidade();
    
    if (!empty($_POST['txHabilidade']) && strlen($_POST['txHabilidade']) >4) {
        $habilidade->setDescHabilidade($_POST['txHabilidade']);
        echo $habilidade->cadastrarHabilidade($habilidade);
    }
?>