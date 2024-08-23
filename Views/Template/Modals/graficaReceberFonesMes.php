<?php if($grafica = "receberFonesMes"){ $receberFonesMes = $data;?>

<script>

    mes8 = '<?= $receberFonesMes['numeroMes']; ?>';
    ano8 = '<?= $receberFonesMes['anio']; ?>';

    Highcharts.chart('graficaMesReceberFones', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Fones recebidos de <?= $receberFonesMes['mes'].' de '.$receberFonesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $receberFonesMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($receberFonesMes['controles'] as $dia) {
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
                    fntInfoChartEquipamento([ano8, mes8, event.point.category, 8]);
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
            name: 'Fones',
            data: [
                <?php 
                foreach ($receberFonesMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>