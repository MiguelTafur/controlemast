<?php if($grafica = "receberTelasMes"){ $receberTelasMes = $data;?>

<script>

    mes11 = '<?= $receberTelasMes['numeroMes']; ?>';
    ano11 = '<?= $receberTelasMes['anio']; ?>';

    Highcharts.chart('graficaMesReceberTelas', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Monitores recebidos de <?= $receberTelasMes['mes'].' de '.$receberTelasMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $receberTelasMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($receberTelasMes['controles'] as $dia) {
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
                foreach ($receberTelasMes['controles'] as $dia) {
                    echo $dia['controle'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>