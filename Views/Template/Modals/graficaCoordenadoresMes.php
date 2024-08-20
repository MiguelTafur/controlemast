<?php if($grafica = "coordenadoresMes"){ $coordenadoresMes = $data;?>

<script>

    mes = '<?= $coordenadoresMes['numeroMes']; ?>';
    ano = '<?= $coordenadoresMes['anio']; ?>';
    
    Highcharts.chart('graficaMesCoordenadores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Coordenadores cadastrados de <?= $coordenadoresMes['mes'].' de '.$coordenadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $coordenadoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($coordenadoresMes['usuarios'] as $dia) {
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
            name: 'Coordenadores',
            data: [
                <?php 
                foreach ($coordenadoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>