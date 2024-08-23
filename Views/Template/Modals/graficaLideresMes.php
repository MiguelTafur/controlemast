<?php if($grafica = "lideresMes"){ $lideresMes = $data;?>

<script>

    mes = '<?= $lideresMes['numeroMes']; ?>';
    ano = '<?= $lideresMes['anio']; ?>';
    
    Highcharts.chart('graficaMesLideres', {
        chart: {
            type: 'line',
            scrollablePlotArea: {
                minWidth: 700,
                scrollPositionX: 1
            }
        },
        title: {
            text: 'Líderes cadastrados de <?= $lideresMes['mes'].' de '.$lideresMes['anio']; ?>'
        },
        subtitle: {
            text: '<b>Total: <?= $lideresMes['total']; ?><b/>'
        },
        xAxis: {
            categories: [
                <?php 
                foreach ($lideresMes['usuarios'] as $dia) {
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
            name: 'Líderes',
            data: [
                <?php 
                foreach ($lideresMes['usuarios'] as $dia) {
                    echo $dia['usuario'].",";
                }
                ?>
            ]
        }]});
</script>

<?php } ?>