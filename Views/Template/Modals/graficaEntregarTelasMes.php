<?php if($grafica = "entregarTelasMes"){ $entregarTelasMes = $data;?>

<script>
    Highcharts.chart('graficaMesEntregarTelas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monitores entregues de <?= $entregarTelasMes['mes'].' de '.$entregarTelasMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $entregarTelasMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregarTelasMes['controles'] as $dia) {
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
                foreach ($entregarTelasMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>