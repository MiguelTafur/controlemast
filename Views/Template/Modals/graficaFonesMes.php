<?php if($grafica = "FonesMes"){ $FonesMes = $data; ?>

<script>
    
    mes = '<?= $FonesMes['nombreMes']; ?>';
    ano = '<?= $FonesMes['anio']; ?>';

    Highcharts.chart('graficaMesFones', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Fones cadastrados de <?= $FonesMes['mes'].' de '.$FonesMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $FonesMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($FonesMes['equipamentos'] as $dia) {
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
                    fntInfoChartFones([ano, mes, event.point.category]);
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
                foreach ($FonesMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>