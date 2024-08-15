<?php if($grafica = "aprendizesMes"){ $aprendizesMes = $data;?>

<script>
    Highcharts.chart('graficaMesAprendizes', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Aprendizes cadastrados de <?= $aprendizesMes['mes'].' de '.$aprendizesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $aprendizesMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($aprendizesMes['usuarios'] as $dia) {
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
                foreach ($aprendizesMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>