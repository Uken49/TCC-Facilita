<html>
<?php
$administrador = new Administrador();
$listaUserOn = $administrador->listarUsuarioOnline();
$listaUserOff = $administrador->listarUsuarioOffline();
$listaQtdUser = $administrador->listarQtdUsuario();

foreach ($listaUserOn as $linha) {
    $cOn = $linha['statusContratante'];
    $pOn = $linha['statusProfissional'];
}
foreach ($listaUserOff as $linha) {
    $cOff = $linha['statusContratante'];
    $pOff = $linha['statusProfissional'];
}
foreach ($listaQtdUser as $linha) {
    $qtdUser = $linha['qtdUsuario'];
}
?>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tipo de Usuário', 'Qtd. Tipo de Usuário'],
                ['Contratante', <?php echo $cOn + $cOff ?>],
                ['Profissional', <?php echo $pOn + $pOff ?>],
            ]);

            var options = {
                backgroundColor: 'transparent',
                title: 'Qtd. Tipo de Usuário',
                pieHole: 0.4,
            };

            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
            chart.draw(data, options);
        }
    </script>
</head>


</html>