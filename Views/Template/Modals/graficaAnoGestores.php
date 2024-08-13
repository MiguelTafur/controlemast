
<?php 
	if($grafica = "gestoresAnio"){
		$gestoresAnio = $data;
 ?>
 <script>
 	Highcharts.chart('graficaAnioGestores', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Gestores do Ano <?= $gestoresAnio['anio'] ?> '
      },
      subtitle: {
        text: 'Gestores Cadastrados<br><b>Total: <?= $gestoresAnio['totalUsuarios'] ?></b> '
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
                foreach ($gestoresAnio['meses'] as $mes) {
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
