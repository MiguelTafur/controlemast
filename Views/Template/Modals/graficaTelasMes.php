<?php if($grafica = "TelasMes"){ $TelasMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesTelas', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monitores Cadastrados <?= $TelasMes['mes'].' de '.$TelasMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $TelasMes['total']; ?>'
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