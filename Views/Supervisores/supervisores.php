<?php 
  headerAdmin($data);
  getModal('modalSupervisores',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
          <i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Adicionar</button>
            <?php } ?>
        </h1>
    </div>

    <!-- Cantidades -->
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="mx-4">
        <h6 class="mb-0">
          TOTAL:  
          <span class="text-success font-italic" id="cantSupervisores">&nbsp;<?= $data['cantidadSupervisores']; ?></span>
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
                <table class="table table-striped text-center" id="tableSupervisores">
                  <thead>
                    <tr>
                      <th>Matrícula</th>
                      <th>Nome</th>
                      <th>Sobrenome</th>
                      <th>Modelo</th>
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
                  <input class="date-picker supervisoresMes" name="supervisoresMes" placeholder="Mês e Ano">
                  <button type="button" class="btn btn-info btn-sm" onclick="fntSearchSupervisoresMes()">
                    <i class="fas fa-search" title="Procurar data"></i>
                  </button>
                </div>
              </div>
              <div id="graficaMesSupervisores"></div>
            </div>
            <div class="tab-pane fade" id="nav-anual" role="tabpanel" aria-labelledby="nav-anual-tab">
              <div class="container-title">
                <div class="dflex">
                  <input class="supervisoresAnio" name="supervisoresAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                  <button type="button" class="btn btn-info btn-sm" onclick="fntSearchSupervisoresAnio()">
                    <i class="fas fa-search" title="Procurar data"></i>
                  </button>
                </div>
              </div>
              <div id="graficaAnioSupervisores"></div>
            </div>
          </div>
        </div>
    </div>
  </div> <!-- .container-fluid -->
</main>
<?php footerAdmin($data); ?>

<script>
  //Mes

  let mes = '<?= $data['supervisoresMDia']['numeroMes']; ?>';
  let ano = '<?= $data['supervisoresMDia']['anio']; ?>';

  Highcharts.chart('graficaMesSupervisores', 
  {
    chart: {
        type: 'line',
        scrollablePlotArea: {
          minWidth: 700,
          scrollPositionX: 1
        }
    },
    title: {
        text: 'Supervisores(as) cadastrados de <?= $data['supervisoresMDia']['mes'].' de '.$data['supervisoresMDia']['anio']; ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['supervisoresMDia']['total']; ?></b>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['supervisoresMDia']['usuarios'] as $dia) {
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
        name: 'Supervisores(as)',
        data: [
          <?php 
            foreach ($data['supervisoresMDia']['usuarios'] as $usuario) {
              echo $usuario['usuario'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioSupervisores', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Supervisores de <?= $data['supervisoresAnio']['anio'] ?>'
    },
    subtitle: {
        text: '<b>Total: <?= $data['supervisoresAnio']['totalUsuarios'] ?></b> '
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
        name: 'Supervisores',
        data: [
          <?php 
            foreach ($data['supervisoresAnio']['meses'] as $mes) {
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
  