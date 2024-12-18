<?php 
  headerAdmin($data);
  getModal('modalReceber',$data); 
  getModal('modalControle',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
        <i class="fa fa-sliders" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModalReceber();"><i class="fa fa-arrow-circle-o-down"></i>Receber</button>
            <?php } ?>
        </h1>
    </div>
    <!-- Cantidades -->
    <ul class="app-breadcrumb breadcrumb d-none d-lg-block text-right">
      <li class="mx-4">
        <h6 class="mb-2">
          TOTAL: 
          <span class="text-success font-italic" id="cantRecebidos">&nbsp;<?= $data['cantidadRecebidos']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          HOJE: 
          <span class="text-success font-italic" id="cantRecebidosHoy">&nbsp;<?= $data['cantidadRecebidosHoy']; ?></span>
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
                  <table class="table table-striped text-center w-100" id="tableReceber">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Ação</th>
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
                  <table class="table table-striped text-center w-100" id="tableReceberComputadores">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Ação</th>
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
                  <table class="table table-striped text-center w-100" id="tableReceberTelas">
                    <thead>
                      <tr>
                        <th>Data</th>
                        <th>Ação</th>
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
                      <input class="date-picker receberFonesMes" name="receberFonesMes" placeholder="Mês e Ano">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchReceberFonesMes()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaMesReceberFones"></div>
                </div>
                <div class="tab-pane fade" id="pills-anualFones" role="tabpanel" aria-labelledby="pills-anualFones-tab">
                  <!-- Gráfica Anual Fones -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="receberFonesAnio" name="receberFonesAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchReceberFonesAnio()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaAnioReceberFones"></div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="nav-graficoComputadores" role="tabpanel" aria-labelledby="nav-graficoComputadores-tab">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="pills-mensalComputadores-tab" data-toggle="pill" href="#pills-mensalComputadores" role="tab" aria-controls="pills-mensalComputadores" aria-selected="true">Mensal</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-anualComputador-tab" data-toggle="pill" href="#pills-anualComputador" role="tab" aria-controls="pills-anualComputador" aria-selected="false">Anual</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-mensalComputadores" role="tabpanel" aria-labelledby="pills-mensalComputadores-tab">
                  <!-- Gráfica Mensual Computadores -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="date-picker receberComputadoresMes" name="receberComputadoresMes" placeholder="Mês e Ano">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchReceberComputadoresMes()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaMesReceberComputadores"></div>
                </div>
                <div class="tab-pane fade" id="pills-anualComputador" role="tabpanel" aria-labelledby="pills-anualComputador-tab">
                  <!-- Gráfica Anual Computadores -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="receberComputadoresAnio" name="receberComputadoresAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchReceberComputadoresAnio()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaAnioReceberComputadores"></div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="nav-graficoTelas" role="tabpanel" aria-labelledby="nav-graficoTelas-tab">
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
                      <input class="date-picker receberTelasMes" name="receberTelasMes" placeholder="Mês e Ano">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchReceberTelasMes()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaMesReceberTelas"></div>
                </div>
                <div class="tab-pane fade" id="pills-anualTelas" role="tabpanel" aria-labelledby="pills-anualTelas-tab">
                  <!-- Gráfica Anual Telas -->
                  <div class="container-title">
                    <div class="dflex">
                      <input class="receberTelasAnio" name="receberTelasAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                      <button type="button" class="btn btn-info btn-sm" onclick="fntSearchReceberTelasAnio()">
                        <i class="fas fa-search" title="Procurar data"></i>
                      </button>
                    </div>
                  </div>
                  <div id="graficaAnioReceberTelas"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>

<script>
  /** FONES **/

  let mes = '<?= $data['receberFonesMDia']['numeroMes']; ?>';
  let ano = '<?= $data['receberFonesMDia']['anio']; ?>';

  //Mes
  Highcharts.chart('graficaMesReceberFones', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Fones recebidos de <?= $data['receberFonesMDia']['mes'].' de '.$data['receberFonesMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['receberFonesMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['receberFonesMDia']['controles'] as $dia) {
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
            foreach ($data['receberFonesMDia']['controles'] as $usuario) {
              echo $usuario['controle'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioReceberFones', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Fones recebidos de <?= $data['receberFonesAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['receberFonesAnio']['totalControle'] ?></b>'
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
        name: 'Receber',
        data: [
          <?php 
            foreach ($data['receberFonesAnio']['meses'] as $mes) {
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
  Highcharts.chart('graficaMesReceberComputadores', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Computadores recebidos de <?= $data['receberComputadoresMDia']['mes'].' de '.$data['receberComputadoresMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['receberComputadoresMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['receberComputadoresMDia']['controles'] as $dia) {
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
            foreach ($data['receberComputadoresMDia']['controles'] as $usuario) {
              echo $usuario['controle'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioReceberComputadores', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Computadores recebidos de <?= $data['receberComputadoresAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['receberComputadoresAnio']['totalControle'] ?></b>'
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
        name: 'Receber',
        data: [
          <?php 
            foreach ($data['receberComputadoresAnio']['meses'] as $mes) {
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
  Highcharts.chart('graficaMesReceberTelas', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Monitores recebidos de <?= $data['receberTelasMDia']['mes'].' de '.$data['receberTelasMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['receberTelasMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['receberTelasMDia']['controles'] as $dia) {
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
            foreach ($data['receberTelasMDia']['controles'] as $usuario) {
              echo $usuario['controle'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioReceberTelas', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monitores recebidos de <?= $data['receberTelasAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['receberTelasAnio']['totalControle'] ?></b>'
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
        name: 'Receber',
        data: [
          <?php 
            foreach ($data['receberTelasAnio']['meses'] as $mes) {
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
  