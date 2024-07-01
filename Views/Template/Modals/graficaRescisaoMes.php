<?php if($grafica = "rescisaoMes"){ $rescisaoMes = $data;?>

<script>
    Highcharts.chart('graficaMesRescisao', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Rescisão de <?= $rescisaoMes['mes'].' de '.$rescisaoMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $rescisaoMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($rescisaoMes['controles'] as $dia) {
                    echo $dia['dia'].",";
                }
                ?>
            ]
        },
        yAxis: {
            title: {
                text: 'GLOBALCOB'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: '',
            data: [
                <?php 
                foreach ($rescisaoMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>