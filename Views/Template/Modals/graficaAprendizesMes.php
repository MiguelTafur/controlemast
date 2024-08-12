<?php if($grafica = "aprendizesMes"){ $aprendizesMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesAprendizes', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Aprendizes Cadastrados <?= $aprendizesMes['mes'].' de '.$aprendizesMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $aprendizesMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($aprendizesMes['usuarios'] as $dia) {
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
                foreach ($aprendizesMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>