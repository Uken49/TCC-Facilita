<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br" class="ls-theme-blue">
<?php include_once("include/head.php"); ?>

<head>
    <title>Adiministrador</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.6.0/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tour-standalone.min.js"></script>
    <link href="../css/bootstrap-tour-standalone.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.6.0/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-tour-standalone.min.js"></script>
</head>

<body>
    <?php
    // include_once("global.php");
    include_once("include/header.php");
    include_once("include/barraLateral.php");
    $administrador = new Administrador();
    $listaUsersOnline = $administrador->listarUsuarioOnline();
    $listaUsersCadastrados = $administrador->listarQtdUsuario();
    foreach ($listaUsersCadastrados as $linha) {
        $userCadastrado = $linha['qtdUsuario'];
    }
    foreach ($listaUsersOnline as $linha) {
        $c = $linha['statusContratante'];
        $p = $linha['statusProfissional'];
    }
    ?>

    <main class="ls-main ">
        <div class="container-fluid">
            <h1 class="ls-title-intro ls-ico-home">Página inicial</h1>
            <h6 class="ls-title-5">
                <label id="informacoesGerais">
                    Informações Gerais
                </label>
            </h6>
            <div class="ls-box ls-board-box">
                <div id="sending-stats" class="row">
                    <div class="col-sm-3">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">Usuários Online
                                    <a href="#" class="ls-ico-help" data-trigger="hover" data-ls-module="popover" data-placement="right" data-custom-class="ls-width-300" data-content="<p>Profissionais online: <?php echo $p ?><br>Contratantes online: <?php echo $c ?><br>Qtnd. de usuários cadastrados: <?php echo $userCadastrado ?></p>" data-target="#ls-popover-0"></a>
                                </h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong><?php echo $p + $c ?></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">Feedback
                                    <a href="#" class="ls-ico-help" data-trigger="hover" data-ls-module="popover" data-placement="right" data-custom-class="ls-width-300" data-content="<p>Quantidade de Feedbacks enviadas pelos usuários do site.</p>" data-target="#ls-popover-1"></a>
                                </h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong>0</strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="ls-box">
                            <div class="ls-box-head">
                                <h6 class="ls-title-4">Denúncias
                                    <a href="#" class="ls-ico-help" data-trigger="hover" data-ls-module="popover" data-placement="left" data-custom-class="ls-width-300" data-content="<p>Este número corresponde a quantidade de vezes que seus destinatários marcaram suas mensagens como spam. Essas denúncias podem comprometer a entregabilidade das suas próximas mensagens.</p>" data-target="#ls-popover-2"></a>
                                </h6>
                            </div>
                            <div class="ls-box-body">
                                <span class="ls-board-data">
                                    <strong>0</strong>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

    <?php include_once("include/notificacao.php") ?>

    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js"></script>
    <script type="text/javascript" src="../js/tourAdm.js"></script>
</body>

</html>