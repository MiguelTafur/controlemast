<?php if($grafica = "aprendizesMes"){ $aprendizesMes = $data;?>

<script>

    mes = '<?= $aprendizesMes['numeroMes']; ?>';
    ano = '<?= $aprendizesMes['anio']; ?>';

    Highcharts.chart('graficaMesAprendizes', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Aprendizes cadastrados de <?= $aprendizesMes['mes'].' de '.$aprendizesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $aprendizesMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($aprendizesMes['usuarios'] as $dia) {
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
            name: 'Aprendizes',
            data: [
                <?php 
                foreach ($aprendizesMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>