<?php if($grafica = "trocasMes"){ $trocasMes = $data;?>

<script>
    Highcharts.chart('graficaMesTrocas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Trocas de <?= $trocasMes['mes'].' de '.$trocasMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $trocasMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($trocasMes['controles'] as $dia) {
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
                foreach ($trocasMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>