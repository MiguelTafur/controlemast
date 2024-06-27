<?php if($grafica = "MousesMes"){ $MousesMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesMouses', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Mouses Cadastrados <?= $MousesMes['mes'].' de '.$MousesMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $MousesMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($MousesMes['equipamentos'] as $dia) {
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
                foreach ($MousesMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>