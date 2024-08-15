<?php if($grafica = "TelasMes"){ $TelasMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesTelas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monitores cadastrados de <?= $TelasMes['mes'].' de '.$TelasMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $TelasMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($TelasMes['equipamentos'] as $dia) {
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
                foreach ($TelasMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>