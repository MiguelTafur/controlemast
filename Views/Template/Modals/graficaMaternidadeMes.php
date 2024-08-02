<?php if($grafica = "maternidadeMes"){ $maternidadeMes = $data;?>

<script>
    Highcharts.chart('graficaMesMaternidade', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'INSS de <?= $maternidadeMes['mes'].' de '.$maternidadeMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $maternidadeMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($maternidadeMes['controles'] as $dia) {
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
                foreach ($maternidadeMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>