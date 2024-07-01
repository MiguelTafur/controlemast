<?php if($grafica = "pediuContaMes"){ $pediuContaMes = $data;?>

<script>
    Highcharts.chart('graficaMesPediuConta', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Pediu Conta de <?= $pediuContaMes['mes'].' de '.$pediuContaMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $pediuContaMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($pediuContaMes['controles'] as $dia) {
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
                foreach ($pediuContaMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>