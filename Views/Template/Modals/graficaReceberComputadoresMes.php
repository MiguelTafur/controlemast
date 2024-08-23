<?php if($grafica = "receberComputadoresMes"){ $receberComputadoresMes = $data;?>

<script>

    mes16 = '<?= $receberComputadoresMes['numeroMes']; ?>';
    ano16 = '<?= $receberComputadoresMes['anio']; ?>';

    Highcharts.chart('graficaMesReceberComputadores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Computadores recebidos de <?= $receberComputadoresMes['mes'].' de '.$receberComputadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $receberComputadoresMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($receberComputadoresMes['controles'] as $dia) {
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
                    fntInfoChartEquipamento([ano16, mes16, event.point.category, 16]);
                  }
              },
            },
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [{
            name: 'Computadores',
            data: [
                <?php 
                foreach ($receberComputadoresMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>