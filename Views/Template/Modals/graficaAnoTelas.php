
<?php 
	if($grafica = "telasAnio"){
		$telasAnio = $data;
 ?>
 <script>
 	Highcharts.chart('graficaAnioTelas', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Monitores do Ano <?= $telasAnio['anio'] ?> '
      },
      subtitle: {
        text: 'Monitores Cadastrados<br><b>Total: <?= $telasAnio['totalEquipamentos'] ?></b> '
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
          name: 'Monitores',
          data: [
            <?php 
                foreach ($telasAnio['meses'] as $mes) {
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
