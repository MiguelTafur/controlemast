<?php if($grafica = "receberComputadoresMes"){ $receberComputadoresMes = $data;?>

<script>
    Highcharts.chart('graficaMesReceberComputadores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Computadores recebidos de <?= $receberComputadoresMes['mes'].' de '.$receberComputadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $receberComputadoresMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($receberComputadoresMes['controles'] as $dia) {
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
                foreach ($receberComputadoresMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>