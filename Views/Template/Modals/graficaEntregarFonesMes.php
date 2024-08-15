<?php if($grafica = "entregarFonesMes"){ $entregarFonesMes = $data;?>

<script>
    Highcharts.chart('graficaMesEntregarFones', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fones entregues de <?= $entregarFonesMes['mes'].' de '.$entregarFonesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $entregarFonesMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregarFonesMes['controles'] as $dia) {
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
                foreach ($entregarFonesMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>