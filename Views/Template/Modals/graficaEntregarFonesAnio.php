
<?php 
	if($grafica = "entregarFonesAnio"){
		$entregarFonesAnio = $data;
 ?>
 <script>
 	Highcharts.chart('graficaAnioEntregarFones', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Fones <?= $entregarFonesAnio['anio'] ?> '
      },
      subtitle: {
        text: 'Entregues<br><b>Total: <?= $entregarFonesAnio['totalControle'] ?></b> '
      },
      xAxis: {
          type: 'category',
          labels: {
              rotation: -45,
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      },
      yAxis: {
          min: 0,
          title: {
              text: ''
          }
      },
      legend: {
          enabled: false
      },
      tooltip: {
          pointFormat: ''
      },
      series: [{
          name: 'Fones',
          data: [
            <?php 
                foreach ($entregarFonesAnio['meses'] as $mes) {
                    echo "['".$mes['mes']."',".$mes['total']."],";
                }
            ?>                  
          ],
          dataLabels: {
              enabled: true,
              rotation: -90,
              color: '#FFFFFF',
              align: 'right',
              y: 10, // 10 pixels down from the top
              style: {
                  fontSize: '15px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
      }]
  });
 </script>

 <?php } ?>
