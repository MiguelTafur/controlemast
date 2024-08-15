<?php if($grafica = "lideresMes"){ $lideresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesLideres', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Líderes cadastrados de <?= $lideresMes['mes'].' de '.$lideresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $lideresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($lideresMes['usuarios'] as $dia) {
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
                foreach ($lideresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>