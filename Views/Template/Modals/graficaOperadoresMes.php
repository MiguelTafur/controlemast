<?php if($grafica = "operadoresMes"){ $operadoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesOperadores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Operadores cadastrados de <?= $operadoresMes['mes'].' de '.$operadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $operadoresMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($operadoresMes['usuarios'] as $dia) {
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
                foreach ($operadoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>