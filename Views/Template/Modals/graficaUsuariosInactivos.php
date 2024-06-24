<?php if($grafica = "usuariosInactivosMes"){ $usuariosInactivosMes = $data;?>

<script>
    
    Highcharts.chart('graficaMesUsuariosInactivos', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Usuários Inactivos de <?= $usuariosInactivosMes['mes'].' de '.$usuariosInactivosMes['anio']; ?>'
        },
        subtitle: {
            text: 'Total: <?= $usuariosInactivosMes['total']; ?>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($usuariosInactivosMes['usuarios'] as $dia) {
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
                foreach ($usuariosInactivosMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>