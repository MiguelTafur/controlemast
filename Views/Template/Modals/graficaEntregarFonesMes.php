<?php if($grafica = "entregarFonesMes"){ $entregarFonesMes = $data;?>

<script>

    mes8 = '<?= $entregarFonesMes['numeroMes']; ?>';
    ano8 = '<?= $entregarFonesMes['anio']; ?>';

    Highcharts.chart('graficaMesEntregarFones', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Fones entregues de <?= $entregarFonesMes['mes'].' de '.$entregarFonesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $entregarFonesMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregarFonesMes['controles'] as $dia) {
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
                foreach ($entregarFonesMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>