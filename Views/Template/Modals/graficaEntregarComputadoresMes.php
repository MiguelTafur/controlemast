<?php if($grafica = "entregarComputadoresMes"){ $entregarComputadoresMes = $data;?>

<script>

    mes16 = '<?= $entregarComputadoresMes['numeroMes']; ?>';
    ano16 = '<?= $entregarComputadoresMes['anio']; ?>';

    Highcharts.chart('graficaMesEntregarComputadores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Computadores entregues de <?= $entregarComputadoresMes['mes'].' de '.$entregarComputadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $entregarComputadoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregarComputadoresMes['controles'] as $dia) {
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
                foreach ($entregarComputadoresMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>