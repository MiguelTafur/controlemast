<?php if($grafica = "ComputadoresMes"){ $ComputadoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesComputadores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Computadores cadastrados de <?= $ComputadoresMes['mes'].' de '.$ComputadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $ComputadoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($ComputadoresMes['equipamentos'] as $dia) {
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
                foreach ($ComputadoresMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>