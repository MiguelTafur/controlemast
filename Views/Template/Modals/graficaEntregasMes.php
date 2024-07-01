<?php if($grafica = "entregasMes"){ $entregasMes = $data;?>

<script>
    Highcharts.chart('graficaMesEntregas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Entregas de <?= $entregasMes['mes'].' de '.$entregasMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $entregasMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregasMes['controles'] as $dia) {
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
                foreach ($entregasMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>