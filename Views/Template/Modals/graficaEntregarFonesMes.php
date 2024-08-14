<?php if($grafica = "entregarFonesMes"){ $entregarFonesMes = $data;?>

<script>
    Highcharts.chart('graficaMesEntregarFones', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Fones Entregues de <?= $entregarFonesMes['mes'].' de '.$entregarFonesMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $entregarFonesMes['total']; ?>'
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