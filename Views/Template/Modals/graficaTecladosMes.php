<?php if($grafica = "TecladosMes"){ $TecladosMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesTeclados', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Teclados Cadastrados <?= $TecladosMes['mes'].' de '.$TecladosMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $TecladosMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($TecladosMes['equipamentos'] as $dia) {
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
                foreach ($TecladosMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>