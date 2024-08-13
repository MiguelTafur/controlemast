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
            <a class="nav-item nav-link active" id="nav-fone-tab" data-toggle="tab" href="#nav-fone" role="tab" aria-controls="nav-fone" aria-selected="true">Fones</a>
            <a class="nav-item nav-link" id="nav-computador-tab" data-toggle="tab" href="#nav-computador" role="tab" aria-controls="nav-computador" aria-selected="false">Computadores</a>
            <a class="nav-item nav-link" id="nav-tela-tab" data-toggle="tab" href="#nav-tela" role="tab" aria-controls="nav-tela" aria-selected="false">Monitores</a>
          </div>
        </nav>
          <div class="tile-body">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-fone" role="tabpanel" aria-labelledby="nav-fone-tab">
                <div class="table-responsive">
                  <table class="table table-striped text-center" id="tableEntregue">
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
                  <input class="date-picker entregarMes" name="entregarMes" placeholder="Mês e Ano">
                  <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarMes()">
                    <i class="fas fa-search" title="Procurar data"></i>
                  </button>
                </div>
              </div>
              <div id="graficaMesEntregar"></div>
            </div>
            <div class="tab-pane fade" id="nav-anual" role="tabpanel" aria-labelledby="nav-anual-tab">
              <div class="container-title">
                <div class="dflex">
                  <input class="entregarAnio" name="entregarAnio" placeholder="Ano" minlength="4" maxlength="4" onkeypress="return controlTag(event);">
                  <button type="button" class="btn btn-info btn-sm" onclick="fntSearchEntregarAnio()">
                    <i class="fas fa-search" title="Procurar data"></i>
                  </button>
                </div>
              </div>
              <div id="graficaAnioEntregar"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .container-fluid -->
</main>

<?php footerAdmin($data); ?>

<script>
  //Mes
  /*Highcharts.chart('graficaMesEntregar', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Entregar Cadastrados <?= $data['entregarMDia']['mes'].' de '.$data['entregarMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['entregarMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['entregarMDia']['usuarios'] as $dia) {
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
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    
    series: [{
        name: '',
        data: [
          <?php 
            foreach ($data['entregarMDia']['usuarios'] as $usuario) {
              echo $usuario['usuario'].",";
            }
          ?>
        ]
    }]
  });

  //Ano
  Highcharts.chart('graficaAnioEntregar', 
  {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Entregar do Ano <?= $data['entregarAnio']['anio'] ?>'
    },
    subtitle: {
        text: 'Entregar Cadastrados<br><b>Total: <?= $data['entregarAnio']['totalUsuarios'] ?></b> '
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
            foreach ($data['entregarAnio']['meses'] as $mes) {
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
  });*/
</script>
  