<?php
$administrador = new Administrador();
$listaRegiaoUsers = $administrador->listarRegiaoUsuario();
$i = 0;
$regiao = array(
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
    12 => 0,
    13 => 0,
    14 => 0,
    15 => 0,
    16 => 0,
    17 => 0,
    18 => 0,
    19 => 0,
    20 => 0,
    21 => 0,
    22 => 0,
    23 => 0,
    24 => 0,
    25 => 0,
    26 => 0,
);
foreach ($listaRegiaoUsers as $linha) {
    $i = $linha['idContratante'];
    $i += $linha['idProfissional'];
    $regiao[$i]++;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Estados', 'Usuários por região'],
                ["ACRE", <?php echo $regiao[0] ?>],
                ["ALAGOAS", <?php echo $regiao[1] ?>],
                ["AMAPÁ", <?php echo $regiao[2] ?>],
                ["AMAZONAS", <?php echo $regiao[3] ?>],
                ["BAHIA", <?php echo $regiao[4] ?>],
                ["CEARÁ", <?php echo $regiao[5] ?>],
                ["ESPÍRITO SANTO", <?php echo $regiao[6] ?>],
                ["GOIÁS", <?php echo $regiao[7] ?>],
                ["MARANHÃO", <?php echo $regiao[8] ?>],
                ["MATO GROSSO", <?php echo $regiao[9] ?>],
                ["MATO GROSSO DO SUL", <?php echo $regiao[10] ?>],
                ["MINAS GERAIS", <?php echo $regiao[11] ?>],
                ["PARÁ", <?php echo $regiao[12] ?>],
                ["PARAÍBA", <?php echo $regiao[13] ?>],
                ["PARANÁ", <?php echo $regiao[14] ?>],
                ["PERNAMBUCO", <?php echo $regiao[15] ?>],
                ["PIAUÍ", <?php echo $regiao[16] ?>],
                ["RIO DE JANEIRO", <?php echo $regiao[17] ?>],
                ["RIO GRANDE DO NORTE", <?php echo $regiao[18] ?>],
                ["RIO GRANDE DO SUL", <?php echo $regiao[19] ?>],
                ["RONDÔNIA", <?php echo $regiao[20] ?>],
                ["RORAIMA", <?php echo $regiao[21] ?>],
                ["SANTA CATARINA", <?php echo $regiao[22] ?>],
                ["SÃO PAULO", <?php echo $regiao[23] ?>],
                ["SERGIPE", <?php echo $regiao[24] ?>],
                ["TOCANTINS", <?php echo $regiao[25] ?>],
                ["DISTRITO FEDERAL", <?php echo $regiao[26] ?>]
            ]);

            var options = {
                backgroundColor: 'transparent',
                title: 'Qtd. de Usuários por Região'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>

</body>

</html>