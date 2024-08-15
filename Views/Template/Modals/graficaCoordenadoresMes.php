<?php if($grafica = "coordenadoresMes"){ $coordenadoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesCoordenadores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Coordenadores cadastrados de <?= $coordenadoresMes['mes'].' de '.$coordenadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $coordenadoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($coordenadoresMes['usuarios'] as $dia) {
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
                foreach ($coordenadoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>