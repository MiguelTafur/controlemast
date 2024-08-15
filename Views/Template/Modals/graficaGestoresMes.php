<?php if($grafica = "gestoresMes"){ $gestoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesGestores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gestores cadastrados de <?= $gestoresMes['mes'].' de '.$gestoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $gestoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($gestoresMes['usuarios'] as $dia) {
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
                foreach ($gestoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>