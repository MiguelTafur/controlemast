<?php if($grafica = "entregarComputadoresMes"){ $entregarComputadoresMes = $data;?>

<script>
    Highcharts.chart('graficaMesEntregarComputadores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Computadores entregues de <?= $entregarComputadoresMes['mes'].' de '.$entregarComputadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $entregarComputadoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregarComputadoresMes['controles'] as $dia) {
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
                foreach ($entregarComputadoresMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>