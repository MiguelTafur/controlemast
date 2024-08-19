<?php if($grafica = "TelasMes"){ $TelasMes = $data;?>

<script>

    mes = '<?= $TelasMes['numeroMes']; ?>';
    ano = '<?= $TelasMes['anio']; ?>';
    
    Highcharts.chart('graficaMesTelas', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Monitores cadastrados de <?= $TelasMes['mes'].' de '.$TelasMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $TelasMes['total']; ?></b>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($TelasMes['equipamentos'] as $dia) {
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
            name: 'Monitores',
            data: [
                <?php 
                foreach ($TelasMes['equipamentos'] as $dia) {
                    echo $dia['equipamento'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>