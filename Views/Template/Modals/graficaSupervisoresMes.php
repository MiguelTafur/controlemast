<?php if($grafica = "supervisoresMes"){ $supervisoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesSupervisores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Supervisores cadastrados de <?= $supervisoresMes['mes'].' de '.$supervisoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $supervisoresMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($supervisoresMes['usuarios'] as $dia) {
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
                foreach ($supervisoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>