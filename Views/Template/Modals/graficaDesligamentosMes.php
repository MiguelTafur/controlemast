<?php if($grafica = "desligamentosMes"){ $desligamentosMes = $data;?>

<script>
    Highcharts.chart('graficaMesDesligamentos', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Desligamentos de <?= $desligamentosMes['mes'].' de '.$desligamentosMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $desligamentosMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($desligamentosMes['controles'] as $dia) {
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
                foreach ($desligamentosMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>