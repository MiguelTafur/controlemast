<?php headerAdmin($data); getModal('modalequipamentos',$data);?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i><?= $data['page_title'] ?></h1>
        </div>
        <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/equipamentos">Dashboard</a></li>
        </ul>
      </div>

      <div class="container-fluid">
        <div class="row">
          <!-- FONES -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/fones" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-headphones fa-3x"></i>
                <div class="info">
                  <h4>Fones</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['fones']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- MÁQUINAS -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/maquinas" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-windows fa-3x"></i>
                <div class="info">
                  <h4>Computadores</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['computadores']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- TELAS -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/telas" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-television fa-3x"></i>
                <div class="info">
                  <h4>Monitores</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['telas']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- TECLADOS -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/teclados" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-keyboard-o fa-3x"></i>
                <div class="info">
                  <h4>Teclados</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['teclados']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- MOUSES -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/mouses" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-mouse fa-3x"></i>
                <div class="info">
                  <h4>Mouses</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['mouses']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>
        </div>

        <!-- informacion general de usuario activos e inactivos -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center">INFORMAÇÃO RECENTE</h3>

          <ul class="nav nav-tabs mb-5" id="equipamentosTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="fones-tab" data-toggle="tab" data-target="#fones" type="button" role="tab" aria-controls="fones" aria-selected="true">FONES</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="maquinas-tab" data-toggle="tab" data-target="#maquinas" type="button" role="tab" aria-controls="maquinas" aria-selected="true">COMPUTADORES</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="monitores-tab" data-toggle="tab" data-target="#monitores" type="button" role="tab" aria-controls="monitores" aria-selected="true">MONITORES</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="teclados-tab" data-toggle="tab" data-target="#teclados" type="button" role="tab" aria-controls="teclados" aria-selected="true">TECLADOS</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="mouses-tab" data-toggle="tab" data-target="#mouses" type="button" role="tab" aria-controls="mouses" aria-selected="true">MOUSES</button>
            </li>
          </ul>
          <div class="tab-content" id="fonesTabContent">
            <div class="tab-pane fade show active" id="fones" role="tabpanel" aria-labelledby="fones-tab">
              <!-- Tabla Fones -->
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>MARCA</th>
                      <th>CÓDIGO</th>
                      <th>LACRE</th>
                      <th>ESTADO</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                      foreach ($data['ultimosFones'] as $ultimos) 
                      {
                        if($ultimos['codigo'] === '') {
                          $ultimos['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                        }

                        switch ($ultimos['status']) {
                          case '1':
                            $trAnotaciones = '<h5><span class="badge badge-success">Disponível</span></h5>';
                            break;
                          case '2':
                            $trAnotaciones = '<h5><span class="badge badge-info">Em Uso</span></h5>';
                            break;
                          case '3':
                            $trAnotaciones = '<h5><span class="badge badge-danger">Estragado</span></h5>';
                            break;
                          default:
                            $trAnotaciones = '<h5><span class="badge badge-warning">Concerto</span></h5>';
                            break;
                        }
                        $ultimos['datecreated'] = date("d-m-Y", strtotime($ultimos['datecreated']));
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimos['datecreated']; ?></td>
                          <td><?= $ultimos['marca']; ?></td>
                          <td><?= $ultimos['codigo']; ?></td>
                          <td><?= '#'.$ultimos['lacre']; ?></td>
                          <td><?= $trAnotaciones; ?></td>
                        </tr>
                    <?php 
                      } 
                    ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchUser()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Fone</button>
              </div>
            </div>
            <div class="tab-pane fade" id="maquinas" role="tabpanel" aria-labelledby="maquinas-tab">
              <p>Computadores</p>
            </div>
            <div class="tab-pane fade" id="monitores" role="tabpanel" aria-labelledby="monitores-tab">
              <p>Monitores</p>
            </div>
            <div class="tab-pane fade" id="teclados" role="tabpanel" aria-labelledby="teclados-tab">
              <p>Teclados</p>
            </div>
            <div class="tab-pane fade" id="mouses" role="tabpanel" aria-labelledby="mouses-tab">
              <p>Mouses</p>
            </div>
          </div>
        </div>
      </div>
      
    </main>
<?php footerAdmin($data); ?>
    