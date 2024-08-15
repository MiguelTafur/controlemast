<?php if($grafica = "FonesMes"){ $FonesMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesFones', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fones cadastrados de <?= $FonesMes['mes'].' de '.$FonesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $FonesMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($FonesMes['equipamentos'] as $dia) {
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
                foreach ($FonesMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>