<?php if($grafica = "gestoresMes"){ $gestoresMes = $data;?>

<script>

    mes = '<?= $gestoresMes['numeroMes']; ?>';
    ano = '<?= $gestoresMes['anio']; ?>';
    
    Highcharts.chart('graficaMesGestores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Gestores cadastrados de <?= $gestoresMes['mes'].' de '.$gestoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $gestoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($gestoresMes['usuarios'] as $dia) {
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
            name: 'Monitor(a)',
            data: [
                <?php 
                foreach ($gestoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>