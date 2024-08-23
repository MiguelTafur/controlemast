<?php if($grafica = "entregarTelasMes"){ $entregarTelasMes = $data;?>

<script>

    mes11 = '<?= $entregarTelasMes['numeroMes']; ?>';
    ano11 = '<?= $entregarTelasMes['anio']; ?>';

    Highcharts.chart('graficaMesEntregarTelas', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Monitores entregues de <?= $entregarTelasMes['mes'].' de '.$entregarTelasMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $entregarTelasMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($entregarTelasMes['controles'] as $dia) {
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
                    fntInfoChartEquipamento([ano11, mes11, event.point.category, 11]);
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
            name: 'Monitores',
            data: [
                <?php 
                foreach ($entregarTelasMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>