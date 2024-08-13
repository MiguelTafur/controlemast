<?php if($grafica = "gestoresMes"){ $gestoresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesGestores', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gestores Cadastrados <?= $gestoresMes['mes'].' de '.$gestoresMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $gestoresMes['total']; ?>'
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