<?php headerAdmin($data); getModal('modalDashboard',$data);?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard">Dashboard</a></li>
        </ul>
      </div>
      
      <div class="container-fluid">
        <div class="row">
          <!-- OPERADORES -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/operacao" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <h4>Operadores(as)</h4>
                  <p>Ativos: <span class="text-success font-italic"><?= $data['operadores']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- APRENDIZES -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/aprendizes" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <h4>Aprendizes</h4>
                  <p>Ativos: <span class="text-success font-italic"><?= $data['aprendizes']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- LÍDERES -->
          <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
              <a href="<?= base_url() ?>/lideres" class="linkw">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>Líderes</h4>
                    <p>
                    <p>Ativos: <span class="text-success font-italic"><?= $data['lideres']; ?></span></p>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

          <!-- GESTORES DE QUALIDADE -->
          <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
              <a href="<?= base_url() ?>/gestores" class="linkw">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>Monitores(as) de Qualidade</h4>
                    <p>
                    <p>Ativos: <span class="text-success font-italic"><?= $data['gestores']; ?></span></p>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

          <!-- COORDINADORES -->
          <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
              <a href="<?= base_url() ?>/coordinadores" class="linkw">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>Coordinadores(as)</h4>
                    <p>
                    <p>Ativos: <span class="text-success font-italic"><?= $data['coordinadores']; ?></span></p>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

          <!-- SUPERVISORES -->
          <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
              <a href="<?= base_url() ?>/supervisores" class="linkw">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>supervisores(as)</h4>
                    <p>
                    <p>Ativos: <span class="text-success font-italic"><?= $data['supervisores']; ?></span></p>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>

          <!-- GERENTES -->
          <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
            <div class="col-md-6 col-lg-3">
              <a href="<?= base_url() ?>/gerentes" class="linkw">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                  <div class="info">
                    <h4>Gerentes</h4>
                    <p>
                    <p>Ativos: <span class="text-success font-italic"><?= $data['gerentes']; ?></span></p>
                    </p>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        </div>

        <!-- informacion general de usuario activos e inactivos -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center">INFORMAÇÃO RECENTE</h3>

          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-ativos-tab" data-toggle="pill" href="#pills-ativos" role="tab" aria-controls="pills-ativos" aria-selected="true">USUÁRIOS ATIVOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-inativos-tab" data-toggle="pill" href="#pills-inativos" role="tab" aria-controls="pills-inativos" aria-selected="false">USUÁRIOS INATIVOS</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-ativos" role="tabpanel" aria-labelledby="pills-ativos-tab">
              <!-- Tabla usuarios Activos -->
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>Cadastro</th>
                      <th>Matrícula</th>
                      <th>Usuário</th>
                      <th>Cargo</th>
                      <th>Modelo</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      foreach ($data['activos'] as $activo) 
                      {
                        $ultimo = explode(" ", $activo['apellidos']);
                        $activo['nombres'] = strtoupper(strtok($activo['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

                        if($activo['modelo'] === 1)
                        {
                          $activo['modelo'] = 'Presencial';
                        }else{
                          $activo['modelo'] = 'Home Office';
                        }

                        $activo['datecreated'] = date("d-m-Y", strtotime($activo['datecreated']));
                        $activo['datecreated'] = fechaInline($activo['datecreated']);
                    ?>
                        <tr class="text-center">
                          <td><?= $activo['datecreated']; ?></td>
                          <td><?= $activo['matricula']; ?></td>
                          <td><?= $activo['nombres']; ?></td>
                          <td><?= $activo['nombrerol']; ?></td>
                          <td><?= $activo['modelo']; ?></td>
                        </tr>
                    <?php 
                      } 
                    ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchUser()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Usuário Ativo</button>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-inativos" role="tabpanel" aria-labelledby="pills-inativos-tab">
              <!-- Tabla usuarios Inactivos -->
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>Entrada</th>
                      <th>Salida</th>
                      <th>Matrícula</th>
                      <th>Usuário</th>
                      <th>Cargo</th>
                      <th>Modelo</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      foreach ($data['inactivos'] as $inactivo) 
                      {
                        $ultimo = explode(" ", $inactivo['apellidos']);
                        $inactivo['nombres'] = strtoupper(strtok($inactivo['nombres'], " "). ' ' . array_reverse($ultimo)[0]);

                        if($inactivo['status'] === 3) {
                          $inactivo['status'] = '<span class="font-weight-bold font-italic text-danger">DESLIGADO(A)</span>';
                        } else if($inactivo['status'] === 4) {
                          $inactivo['status'] = '<span class="font-weight-bold font-italic text-danger">PEDIU CONTA</span>';
                        } else if($inactivo['status'] === 5) {
                          $inactivo['status'] = '<span class="font-weight-bold font-italic text-danger">SEM RENOVAÇÃO</span>';
                        } else if($inactivo['status'] === 6) {
                          $inactivo['status'] = '<span class="font-weight-bold font-italic text-danger">JUSTA CAUSA</span>';
                        } else if($inactivo['status'] === 7) {
                          $inactivo['status'] = '<span class="font-weight-bold font-italic text-danger">RESCISÃO</span>';
                        }

                        if($inactivo['modelo'] === 1)
                        {
                          $inactivo['modelo'] = 'Presencial';
                        }else{
                          $inactivo['modelo'] = 'Home Office';
                        }

                        $inactivo['datecreated'] = date("d-m-Y", strtotime($inactivo['datecreated']));
                        $inactivo['fechaControle'] = date("d-m-Y", strtotime($inactivo['fechaControle']));
                        $inactivo['datecreated'] = fechaInline($inactivo['datecreated']);
                        $inactivo['fechaControle'] = fechaInline($inactivo['fechaControle']);
                    ?>
                        <tr class="text-center">
                          <td><?= $inactivo['datecreated']; ?></td>
                          <td><?= $inactivo['fechaControle']; ?></td>
                          <td><?= $inactivo['matricula']; ?></td>
                          <td><?= $inactivo['nombres']; ?></td>
                          <td><?= $inactivo['nombrerol']; ?></td>
                          <td><?= $inactivo['modelo']; ?></td>
                          <td><?= $inactivo['status']; ?></td>
                        </tr>
                    <?php 
                      } 
                    ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchUserI()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Usuário Inativo</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráficas de Usuarios -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center">GRÁFICO DE USUÁRIOS</h3>
          <ul class="nav nav-tabs mb-3" id="pills-tabGrafico" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-graficoAtivos-tab" data-toggle="pill" href="#pills-graficoAtivos" role="tab" aria-controls="pills-ativos" aria-selected="true">USUÁRIOS ATIVOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoInativos-tab" data-toggle="pill" href="#pills-graficoInativos" role="tab" aria-controls="pills-inativos" aria-selected="false">USUÁRIOS INATIVOS</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabGraficoContent">
            <!-- Gráfica usuarios Activos -->
            <div class="tab-pane fade show active" id="pills-graficoAtivos" role="tabpanel" aria-labelledby="pills-graficoAtivos-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker usuariosActivosMes" name="usuariosActivosMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchUAMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesUsuariosActivos"></div>
              </div>
            </div>
            
            <div class="tab-pane fade" id="pills-graficoInativos" role="tabpanel" aria-labelledby="pills-graficoInativos-tab">
              <!-- Gráfica usuarios Inactivos -->
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker usuariosInactivosMes" name="usuariosInactivosMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchUIMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesUsuariosInactivos"></div>
              </div>
            </div>
          </div>
        </div>

      </div>
      
    </main>
<?php footerAdmin($data); ?>

<script>
  // Gráfica de usuarios activos
  Highcharts.chart('graficaMesUsuariosActivos', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Novos Usuários de <?= $data['usuariosActivosMDia']['mes'].' de '.$data['usuariosActivosMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['usuariosActivosMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['usuariosActivosMDia']['usuarios'] as $dia) {
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
            foreach ($data['usuariosActivosMDia']['usuarios'] as $cobrado) {
              echo $cobrado['usuario'].",";
            }
          ?>
        ]
    }]
  });

  //Gráfica de usuarios inactivos
  Highcharts.chart('graficaMesUsuariosInactivos', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Usuários Inactivos de <?= $data['usuariosInactivosMDia']['mes'].' de '.$data['usuariosInactivosMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['usuariosInactivosMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['usuariosInactivosMDia']['usuarios'] as $dia) {
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
            foreach ($data['usuariosInactivosMDia']['usuarios'] as $cobrado) {
              echo $cobrado['usuario'].",";
            }
          ?>
        ]
    }]
  });
</script>
    