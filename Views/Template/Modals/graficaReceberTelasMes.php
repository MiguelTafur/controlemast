<?php if($grafica = "receberTelasMes"){ $receberTelasMes = $data;?>

<script>
    Highcharts.chart('graficaMesReceberTelas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monitores recebidos de <?= $receberTelasMes['mes'].' de '.$receberTelasMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $receberTelasMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($receberTelasMes['controles'] as $dia) {
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
                foreach ($receberTelasMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>