<?php if($grafica = "usuariosActivosMes"){ $usuariosActivosMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesUsuariosActivos', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Novos Usuários de <?= $usuariosActivosMes['mes'].' de '.$usuariosActivosMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $usuariosActivosMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($usuariosActivosMes['usuarios'] as $dia) {
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
                foreach ($usuariosActivosMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>