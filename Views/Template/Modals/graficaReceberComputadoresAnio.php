
<?php 
	if($grafica = "receberComputadoresAnio"){
		$receberComputadoresAnio = $data;
 ?>
 <script>
 	Highcharts.chart('graficaAnioReceberComputadores', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Computadores de <?= $receberComputadoresAnio['anio'] ?> '
      },
      subtitle: {
        text: 'Recebidos<br><b>Total: <?= $receberComputadoresAnio['totalControle'] ?></b> '
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
          name: 'Computadores',
          data: [
            <?php 
                foreach ($receberComputadoresAnio['meses'] as $mes) {
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
