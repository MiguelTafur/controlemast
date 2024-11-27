<?php if($grafica = "DPMes"){ $DPMes = $data;?>

<script>

    mes = '<?= $DPMes['numeroMes']; ?>';
    ano = '<?= $DPMes['anio']; ?>';
    
    Highcharts.chart('graficaMesDP', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'DP cadastrados de <?= $DPMes['mes'].' de '.$DPMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $DPMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($DPMes['usuarios'] as $dia) {
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
            name: 'DP',
            data: [
                <?php 
                foreach ($DPMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>