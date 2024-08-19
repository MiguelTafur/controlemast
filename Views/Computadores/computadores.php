<?php 
  headerAdmin($data);
  getModal('modalComputadores',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
            <i class="fa fa-windows" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i></button>
            <?php } ?>
        </h1>
    </div>
    <!-- Cantidad de computadores -->
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="mx-4">
        <h6 class="mb-0">
          DISPONÍVEIS: 
          <span class="text-success font-italic" id="cantComputadorD"><?= $data['cantidadComputadoresD']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          EM USO: 
          <span class="text-info font-italic" id="cantComputadorU"><?= $data['cantidadComputadoresU']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          ESTRAGADOS: 
          <span class="text-danger font-italic" id="cantComputadorE"><?= $data['cantidadComputadoresE']; ?></span>
        </h6>
      </li>
      <li class="ml-3">
        <h6 class="mb-0">
          CONCERTO: 
          <span class="text-warning font-italic" id="cantComputadorC"><?= $data['cantidadComputadoresC']; ?></span>
        </h6>
      </li>
    </ul>
  </div>

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
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <div class="table-responsive">
                  <table class="table table-striped text-center" id="tableComputadores">
                    <thead>
                      <tr>
                        <th>Marca</th>
                        <th>Código / Serial</th>
                        <th>Patrimônio</th>
                        <th>Estado</th>
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
          <nav class="mb-3">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-mensal-tab" data-toggle="tab" href="#nav-mensal" role="tab" aria-controls="nav-mensal" aria-selected="true">
                Mensal
              </a>
              <a class="nav-item nav-link" id="nav-anual-tab" data-toggle="tab" href="#nav-anual" role="tab" aria-controls="nav-anual" aria-selected="false">
                Anual
              </a>
            </div>
          </nav>
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-mensal" role="tabpanel" aria-labelledby="nav-mensal-tab">
              <div class="container-title">
                <div class="dflex">
                  <input class="date-picker computadoresMes" name="computadoresMes" placeholder="Mês e Ano">
                  <button type="button" class="btn btn-info btn-sm" onclick="fntSearchComputadoresMes()">
                    <i class="fas fa-search" title="Procurar data"></i>
                  </button>
                </div>
              </div>
              <div id="graficaMesComputadores"></div>
            </div>
            <div class="tab-pane fade" id="nav-anual" role="tabpanel" aria-labelledby="nav-anual-tab">
              <div class="container-title">
                <div class="dflex">
                  <input class="computadoresAnio" name="computadoresAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                  <button type="button" class="btn btn-info btn-sm" onclick="fntSearchComputadoresAnio()">
                    <i class="fas fa-search" title="Procurar data"></i>
                  </button>
                </div>
              </div>
              <div id="graficaAnioComputadores"></div>
            </div>
          </div>
        </div>
    </div>
  </div> <!-- .container-fluid -->
</main>

<?php footerAdmin($data); ?>

<script>
  //Mes
  let mes = '<?= $data['computadoresMDia']['numeroMes']; ?>';
  let ano = '<?= $data['computadoresMDia']['anio']; ?>';
  Highcharts.chart('graficaMesComputadores', 
  {
    chart: {
      type: 'line',
      scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
      }
    },
    title: {
        text: 'Computadores cadastrados de <?= $data['computadoresMDia']['mes'].' de '.$data['computadoresMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['computadoresMDia']['total']; ?></b>'
    },
    xAxis: {
      categories: [
        <?php 
          foreach ($data['computadoresMDia']['equipamentos'] as $dia) {
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
            fntInfoChartEquipamento([ano, mes, event.point.category]);
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
        name: '',
        data: [
          <?php 
            foreach ($data['computadoresMDia']['equipamentos'] as $equipamento) {
              echo $equipamento['equipamento'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioComputadores', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Computadores cadastrados de <?= $data['computadoresAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['computadoresAnio']['totalEquipamentos'] ?></b> '
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
            foreach ($data['computadoresAnio']['meses'] as $mes) {
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
  