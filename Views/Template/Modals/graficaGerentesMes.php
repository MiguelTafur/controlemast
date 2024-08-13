<?php if($grafica = "gerentesMes"){ $gerentesMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesGerentes', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Gerentes Cadastrados <?= $gerentesMes['mes'].' de '.$gerentesMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $gerentesMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($gerentesMes['usuarios'] as $dia) {
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
                foreach ($gerentesMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>