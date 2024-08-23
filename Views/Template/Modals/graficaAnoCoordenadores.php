
<?php 
	if($grafica = "coordenadoresAnio"){
		$coordenadoresAnio = $data;
 ?>
 <script>
 	Highcharts.chart('graficaAnioCoordenadores', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Coordenadores cadastrados de <?= $coordenadoresAnio['anio'] ?> '
      },
      subtitle: {
        text: '<b>Total: <?= $coordenadoresAnio['totalUsuarios'] ?></b> '
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
                foreach ($coordenadoresAnio['meses'] as $mes) {
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
