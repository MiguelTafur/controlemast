<?php if($grafica = "receberFonesMes"){ $receberFonesMes = $data;?>

<script>
    Highcharts.chart('graficaMesReceberFones', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fones recebidos de <?= $receberFonesMes['mes'].' de '.$receberFonesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $receberFonesMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($receberFonesMes['controles'] as $dia) {
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
                foreach ($receberFonesMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>