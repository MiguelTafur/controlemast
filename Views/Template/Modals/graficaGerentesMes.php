<?php if($grafica = "gerentesMes"){ $gerentesMes = $data;?>

<script>

    mes = '<?= $gerentesMes['numeroMes']; ?>';
    ano = '<?= $gerentesMes['anio']; ?>';
    
    Highcharts.chart('graficaMesGerentes', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Gerentes cadastrados de <?= $gerentesMes['mes'].' de '.$gerentesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $gerentesMes['total']; ?><b/>'
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
            series: {
                cursor: 'pointer',
                events: {
                    click: function(event){
                        fntInfoChartPersona([ano, mes, event.point.category]);
                    }
                }
            },
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Gerentes',
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