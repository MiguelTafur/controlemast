<?php if($grafica = "lideresMes"){ $lideresMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesLideres', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Líderes Cadastrados <?= $lideresMes['mes'].' de '.$lideresMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $lideresMes['total']; ?>'
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