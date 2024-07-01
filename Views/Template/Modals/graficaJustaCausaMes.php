<?php if($grafica = "JustaCausaMes"){ $JustaCausaMes = $data;?>

<script>
    Highcharts.chart('graficaMesJustaCausa', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Justa Causa de <?= $JustaCausaMes['mes'].' de '.$JustaCausaMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $JustaCausaMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($JustaCausaMes['controles'] as $dia) {
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
                foreach ($JustaCausaMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>