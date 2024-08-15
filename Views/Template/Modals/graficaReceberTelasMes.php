<?php if($grafica = "receberTelasMes"){ $receberTelasMes = $data;?>

<script>
    Highcharts.chart('graficaMesReceberTelas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Telas recebidas de <?= $receberTelasMes['mes'].' de '.$receberTelasMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $receberTelasMes['total']; ?>'
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