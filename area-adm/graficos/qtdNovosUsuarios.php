<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<?php
$administrador = new Administrador();
$listaMesUsers = $administrador->listarMes();
$i = 0;
$mes = array(
    0 => 0,
    1 => 0,
    2 => 0,
    3 => 0,
    4 => 0,
    5 => 0,
    6 => 0,
    7 => 0,
    8 => 0,
    9 => 0,
    10 => 0,
    11 => 0,
);
foreach ($listaMesUsers as $linha) {
    $i = $linha['Mês'];
    $mes[$i - 1]++;
}

?>

<head>
    <title>EmpregaKi</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mês', 'Usúario Novos'],
            ['Jan', <?php echo $mes[0] ?>],
            ['Fev', <?php echo $mes[1] ?>],
            ['Mar', <?php echo $mes[2] ?>],
            ['Abr', <?php echo $mes[3] ?>],
            ['Mai', <?php echo $mes[4] ?>],
            ['Jun', <?php echo $mes[5] ?>],
            ['Jul', <?php echo $mes[6] ?>],
            ['Ago', <?php echo $mes[7] ?>],
            ['Set', <?php echo $mes[8] ?>],
            ['Out', <?php echo $mes[9] ?>],
            ['Nov', <?php echo $mes[10] ?>],
            ['Dez', <?php echo $mes[11] ?>],
        ]);

        var options = {
            backgroundColor: 'transparent',
            title: 'Usuários cadastrados em 2021',
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
</script>

</html>