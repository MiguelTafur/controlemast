<?php if($grafica = "supervisoresMes"){ $supervisoresMes = $data;?>

<script>

    mes = '<?= $supervisoresMes['numeroMes']; ?>';
    ano = '<?= $supervisoresMes['anio']; ?>';
    
    Highcharts.chart('graficaMesSupervisores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Supervisores(as) cadastrados de <?= $supervisoresMes['mes'].' de '.$supervisoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $supervisoresMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($supervisoresMes['usuarios'] as $dia) {
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
            name: 'Supervisores(as)',
            data: [
                <?php 
                foreach ($supervisoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>