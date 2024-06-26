<?php if($grafica = "FonesMes"){ $FonesMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesFones', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fones Cadastrados <?= $FonesMes['mes'].' de '.$FonesMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $FonesMes['total']; ?>'
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