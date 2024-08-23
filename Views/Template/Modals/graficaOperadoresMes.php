<?php if($grafica = "operadoresMes"){ $operadoresMes = $data;?>

<script>

    mes = '<?= $operadoresMes['numeroMes']; ?>';
    ano = '<?= $operadoresMes['anio']; ?>';
    
    Highcharts.chart('graficaMesOperadores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Operadores cadastrados de <?= $operadoresMes['mes'].' de '.$operadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $operadoresMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($operadoresMes['usuarios'] as $dia) {
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
            name: 'Operadores',
            data: [
                <?php 
                foreach ($operadoresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>