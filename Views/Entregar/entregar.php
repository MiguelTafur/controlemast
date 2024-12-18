<?php 
  headerAdmin($data);
  getModal('modalControle',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
        <i class="fa fa-sliders" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModalEntregue();" >Entregar <i class="fa fa-arrow-circle-o-up"></i></button>
            <?php } ?>
        </h1>
    </div>

    <!-- Cantidades -->
    <ul class="app-breadcrumb breadcrumb d-none d-lg-block text-right">
      <li class="mx-4">
        <h6 class="mb-2">
          TOTAL: 
          <span class="text-success font-italic" id="cantEntregas">&nbsp;<?= $data['cantidadEntregas']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          HOJE: 
          <span class="text-success font-italic" id="cantEntregasHoy">&nbsp;<?= $data['cantidadEntregasHoy']; ?></span>
        </h6>
      </li>
    </ul>
  </div>
  
  <!-- GRÁFICAS -->
  <div class="container-fluid">
    <ul class="nav nav-pills my-4 justify-content-center" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-lista-tab" data-toggle="pill" href="#pills-lista" role="tab" aria-controls="pills-lista" aria-selected="true">
          <i class="fa fa-list"></i>
          &nbsp;LISTA
          </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-grafica-tab" data-toggle="pill" href="#pills-grafica" role="tab" aria-controls="pills-grafica" aria-selected="false">
        <i class="fa fa-bar-chart"></i>
          GRÁFICOS
        </a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-lista" role="tabpanel" aria-labelledby="pills-lista-tab">
        <div class="tile">
          <nav class="mb-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-fone-tab" data-toggle="tab" href="#nav-fone" role="tab" aria-controls="nav-fone" aria-selected="true">FONES</a>
              <!-- <a class="nav-item nav-link" id="nav-computador-tab" data-toggle="tab" href="#nav-computador" role="tab" aria-controls="nav-computador" aria-selected="false">COMPUTADORES</a>
              <a class="nav-item nav-link" id="nav-tela-tab" data-toggle="tab" href="#nav-tela" role="tab" aria-controls="nav-tela" aria-selected="false">MONITORES</a> -->
            </div>
          </nav>
          <div class="tile-body">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-fone" role="tabpanel" aria-labelledby="nav-fone-tab">
                <!-- Tabla Fones -->
                <div class="table-responsive">
                  <table class="table table-striped text-center w-100" id="tableEntregue">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Protocolo</th>
                        <th>Equipamento</th>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-computador" role="tabpanel" aria-labelledby="nav-computador-tab">
                <!-- Tabla PCS -->
                <div class="table-responsive">
                  <table class="table table-striped text-center w-100" id="tableEntregueComputadores">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Protocolo</th>
                        <th>Equipamento</th>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="nav-tela" role="tabpanel" aria-labelledby="nav-tela-tab">
                <!-- Tabla Telas -->
                <div class="table-responsive">
                  <table class="table table-striped text-center w-100" id="tableEntregueTelas">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Protocolo</th>
                        <th>Equipamento</th>
                        <th>Matrícula</th>
                        <th>Nome</th>
                        <th class="text-center">Ações</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="pills-grafica" role="tabpanel" aria-labelledby="pills-grafica-tab">
        <div class="tile">
          <nav class="mb-4">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-graficoFones-tab" data-toggle="tab" href="#nav-graficoFones" role="tab" aria-controls="nav-graficoFones" aria-selected="true">FONES</a>
              <!-- <a class="nav-item nav-link" id="nav-graficoComputadores-tab" data-toggle="tab" href="#nav-graficoComputadores" role="tab" aria-controls="nav-graficoComputadores" aria-selected="false">COMPUTADORES</a>
              <a class="nav-item nav-link" id="nav-graficoTelas-tab" data-toggle="tab" href="#nav-graficoTelas" role="tab" aria-controls="nav-graficoTelas" aria-selected="false">MONITORES</a> -->
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-graficoFones" role="tabpanel" aria-labelledby="nav-graficoFones-tab">
              <!-- ****  GRÁFICA FONES  **** -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-mensalFones-tab" data-toggle="pill" href="#pills-mensalFones" role="tab" aria-controls="pills-mensalFones" aria-selected="true">Mensal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-anualFones-tab" data-toggle="pill" href="#pills-anualFones" role="tab" aria-controls="pills-anualFones" aria-selected="false">Anual</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-mensalFones" role="tabpanel" aria-labelledby="pills-mensalFones-tab">
                  <!-- Gráfica Mensual Fones -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="date-picker entregarFonesMes" name="entregarFonesMes" placeholder="Mês e Ano">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarFonesMes()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaMesEntregarFones"></div>
                </div>
                <div class="tab-pane fade" id="pills-anualFones" role="tabpanel" aria-labelledby="pills-anualFones-tab">
                  <!-- Gráfica Anual Fones -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="entregarFonesAnio" name="entregarFonesAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarFonesAnio()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaAnioEntregarFones"></div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-graficoComputadores" role="tabpanel" aria-labelledby="nav-graficoComputadores-tab">
              <!-- ****  GRÁFICA PCS  **** -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-mensalComputadores-tab" data-toggle="pill" href="#pills-mensalComputadores" role="tab" aria-controls="pills-mensalComputadores" aria-selected="true">Mensal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-anualComputadores-tab" data-toggle="pill" href="#pills-anualComputadores" role="tab" aria-controls="pills-anualComputadores" aria-selected="false">Anual</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-mensalComputadores" role="tabpanel" aria-labelledby="pills-mensalComputadores-tab">
                  <!-- Gráfica Mensual PCS -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="date-picker entregarComputadoresMes" name="entregarComputadoresMes" placeholder="Mês e Ano">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarComputadoresMes()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaMesEntregarComputadores"></div>
                </div>
                <div class="tab-pane fade" id="pills-anualComputadores" role="tabpanel" aria-labelledby="pills-anualComputadores-tab">
                  <!-- Gráfica Anual PCS -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="entregarComputadoresAnio" name="entregarComputadoresAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarComputadoresAnio()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaAnioEntregarComputadores"></div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="nav-graficoTelas" role="tabpanel" aria-labelledby="nav-graficoTelas-tab">
              <!-- ****  GRÁFICA Telas  **** -->
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-mensalTelas-tab" data-toggle="pill" href="#pills-mensalTelas" role="tab" aria-controls="pills-mensalTelas" aria-selected="true">Mensal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-anualTelas-tab" data-toggle="pill" href="#pills-anualTelas" role="tab" aria-controls="pills-anualTelas" aria-selected="false">Anual</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-mensalTelas" role="tabpanel" aria-labelledby="pills-mensalTelas-tab">
                  <!-- Gráfica Mensual Telas -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="date-picker entregarTelasMes" name="entregarTelasMes" placeholder="Mês e Ano">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarTelasMes()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaMesEntregarTelas"></div>
                </div>
                <div class="tab-pane fade" id="pills-anualTelas" role="tabpanel" aria-labelledby="pills-anualTelas-tab">
                  <!-- Gráfica Anual Telas -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="entregarTelasAnio" name="entregarTelasAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarTelasAnio()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaAnioEntregarTelas"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .container-fluid -->
</main>

<?php footerAdmin($data); ?>

<script>
  /** FONES **/
  //Mes

  let mes = '<?= $data['entregarFonesMDia']['numeroMes']; ?>';
  let ano = '<?= $data['entregarFonesMDia']['anio']; ?>';

  Highcharts.chart('graficaMesEntregarFones', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Fones entregues de <?= $data['entregarFonesMDia']['mes'].' de '.$data['entregarFonesMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['entregarFonesMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['entregarFonesMDia']['controles'] as $dia) {
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
            fntInfoChartEquipamento([ano, mes, event.point.category, 8]);
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
        name: 'Fones',
        data: [
          <?php 
            foreach ($data['entregarFonesMDia']['controles'] as $usuario) {
              echo $usuario['controle'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioEntregarFones', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Fones entregues de <?= $data['entregarFonesAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['entregarFonesAnio']['totalControle'] ?></b>'
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
        name: 'Entregar',
        data: [
          <?php 
            foreach ($data['entregarFonesAnio']['meses'] as $mes) {
              echo "['".$mes['mes']."',".$mes['total']."],";
            }
            ?>                 
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#fff',
            align: 'right',
            y: 0,
            style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });

  /** PCS **/
  //Mes
  Highcharts.chart('graficaMesEntregarComputadores', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Computadores entregues de <?= $data['entregarComputadoresMDia']['mes'].' de '.$data['entregarComputadoresMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['entregarComputadoresMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['entregarComputadoresMDia']['controles'] as $dia) {
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
            fntInfoChartEquipamento([ano, mes, event.point.category, 16]);
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
        name: 'Computadores',
        data: [
          <?php 
            foreach ($data['entregarComputadoresMDia']['controles'] as $usuario) {
              echo $usuario['controle'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioEntregarComputadores', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Computadores entregues de <?= $data['entregarComputadoresAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['entregarComputadoresAnio']['totalControle'] ?></b>'
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
        name: 'Entregar',
        data: [
          <?php 
            foreach ($data['entregarComputadoresAnio']['meses'] as $mes) {
              echo "['".$mes['mes']."',".$mes['total']."],";
            }
            ?>                 
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#fff',
            align: 'right',
            y: 0,
            style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });

  /** TELAS **/
  //Mes
  Highcharts.chart('graficaMesEntregarTelas', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Monitores entregues de <?= $data['entregarTelasMDia']['mes'].' de '.$data['entregarTelasMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['entregarTelasMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['entregarTelasMDia']['controles'] as $dia) {
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
            fntInfoChartEquipamento([ano, mes, event.point.category, 11]);
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
        name: 'Monitores',
        data: [
          <?php 
            foreach ($data['entregarTelasMDia']['controles'] as $usuario) {
              echo $usuario['controle'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioEntregarTelas', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monitores entregues de <?= $data['entregarTelasAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['entregarTelasAnio']['totalControle'] ?></b>'
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
        name: 'Entregar',
        data: [
          <?php 
            foreach ($data['entregarTelasAnio']['meses'] as $mes) {
              echo "['".$mes['mes']."',".$mes['total']."],";
            }
            ?>                 
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#fff',
            align: 'right',
            y: 0,
            style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
  });

</script>
  