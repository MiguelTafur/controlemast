<?php if($grafica = "supervisoresMes"){ $supervisoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesSupervisores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Supervisores Cadastrados <?= $supervisoresMes['mes'].' de '.$supervisoresMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $supervisoresMes['total']; ?>'
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