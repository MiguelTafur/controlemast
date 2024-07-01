<?php if($grafica = "semRenovacaoMes"){ $semRenovacaoMes = $data;?>

<script>
    Highcharts.chart('graficaMesSemRenovacao', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Sem Renovação de <?= $semRenovacaoMes['mes'].' de '.$semRenovacaoMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $semRenovacaoMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($semRenovacaoMes['controles'] as $dia) {
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
                foreach ($semRenovacaoMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>