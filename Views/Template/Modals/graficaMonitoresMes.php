<?php if($grafica = "MonitoresMes"){ $MonitoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesMonitores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monitores Cadastrados <?= $MonitoresMes['mes'].' de '.$MonitoresMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $MonitoresMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($MonitoresMes['equipamentos'] as $dia) {
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
                foreach ($MonitoresMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>