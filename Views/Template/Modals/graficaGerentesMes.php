<?php if($grafica = "gerentesMes"){ $gerentesMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesGerentes', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gerentes cadastrados de <?= $gerentesMes['mes'].' de '.$gerentesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $gerentesMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($gerentesMes['usuarios'] as $dia) {
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
                foreach ($gerentesMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>