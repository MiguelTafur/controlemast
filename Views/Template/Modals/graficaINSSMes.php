<?php if($grafica = "INSSMes"){ $INSSMes = $data;?>

<script>
    Highcharts.chart('graficaMesINSS', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'INSS de <?= $INSSMes['mes'].' de '.$INSSMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $INSSMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($INSSMes['controles'] as $dia) {
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
                foreach ($INSSMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>