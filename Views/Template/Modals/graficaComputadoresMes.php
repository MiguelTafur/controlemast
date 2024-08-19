<?php if($grafica = "ComputadoresMes"){ $ComputadoresMes = $data;?>

<script>
    
    mes = '<?= $ComputadoresMes['numeroMes']; ?>';
    ano = '<?= $ComputadoresMes['anio']; ?>';

    Highcharts.chart('graficaMesComputadores', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Computadores cadastrados de <?= $ComputadoresMes['mes'].' de '.$ComputadoresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $ComputadoresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($ComputadoresMes['equipamentos'] as $dia) {
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
                    fntInfoChartEquipamento([ano, mes, event.point.category]);
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
            name: 'PC',
            data: [
                <?php 
                foreach ($ComputadoresMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>