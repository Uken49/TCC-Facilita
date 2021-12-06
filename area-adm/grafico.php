<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br" class="ls-theme-blue">
<?php include_once("include/head.php"); ?>

<head>
    <title>Adiministrador - Gráficos</title>
</head>

<body>

    <?php
    include_once("include/header.php");
    include_once("include/barraLateral.php");
    include_once("graficos/qtdNovosUsuarios.php");
    include_once("graficos/qtdUsuariosRegiao.php");
    include_once("graficos/qtdTipoUsuarios.php");
    ?>

    <main class="ls-main ">
        <div class="container-fluid">
            <h1 class="ls-title-intro ls-ico-dashboard">Gráficos</h1>

            <h6 class="ls-title-5">Informações Gerais</h6>
            <div class="ls-box ls-board-box">
                <div id="sending-stats" class="row">
                    <div class="col-sm-3">
                        <div class="ls-box">
                            <div id="donutchart" align="center"></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="ls-box">
                            <div id="piechart" align="center"></div>
                        </div>
                    </div>
                </div><br>
                <div id="sending-stats" class="col">
                    <div class="row-sm-3">
                        <div class="ls-box">
                            <div id="chart_div" align="center" style="width:100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once("include/notificacao.php"); ?>


    <!-- We recommended use jQuery 1.10 or up -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://assets.locaweb.com.br/locastyle/3.10.1/javascripts/locastyle.js" type="text/javascript"></script>
</body>

</html>