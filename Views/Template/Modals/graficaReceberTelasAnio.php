
<?php 
	if($grafica = "receberTelasAnio"){
		$receberTelasAnio = $data;
 ?>
 <script>
 	Highcharts.chart('graficaAnioReceberTelas', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Monitores recebidos de <?= $receberTelasAnio['anio'] ?> '
      },
      subtitle: {
        text: '<b>Total: <?= $receberTelasAnio['totalControle'] ?></b> '
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
          name: 'Telas',
          data: [
            <?php 
                foreach ($receberTelasAnio['meses'] as $mes) {
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
