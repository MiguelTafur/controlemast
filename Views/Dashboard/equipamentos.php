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

        <!-- informacion general de equipamentos -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center mb-4">INFORMAÇÃO RECENTE</h3>

          <ul class="nav nav-tabs mb-5" id="equipamentosTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link active" id="fones-tab" data-toggle="tab" data-target="#fones" role="tab" aria-controls="fones" aria-selected="true">FONES</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="maquinas-tab" data-toggle="tab" data-target="#maquinas" role="tab" aria-controls="maquinas" aria-selected="true">COMPUTADORES</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="monitores-tab" data-toggle="tab" data-target="#monitores" role="tab" aria-controls="monitores" aria-selected="true">MONITORES</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="teclados-tab" data-toggle="tab" data-target="#teclados" role="tab" aria-controls="teclados" aria-selected="true">TECLADOS</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="mouses-tab" data-toggle="tab" data-target="#mouses" role="tab" aria-controls="mouses" aria-selected="true">MOUSES</a>
            </li>
          </ul>
          <div class="tab-content" id="fonesTabContent">
            <!-- div Fones -->
            <div class="tab-pane fade show active" id="fones" role="tabpanel" aria-labelledby="fones-tab">
              <ul class="nav nav-pills mb-3" id="pills-tab-fones" role="tablist">
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link active" id="pills-fonesdisponibles-tab" data-toggle="pill" data-target="#pills-fonesdisponibles" role="tab" aria-controls="pills-fonesdisponibles" aria-selected="true">Disponíveis</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link" id="pills-fonesuso-tab" data-toggle="pill" data-target="#pills-fonesuso" role="tab" aria-controls="pills-fonesuso" aria-selected="false">Em Uso</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link" id="pills-fonesestragados-tab" data-toggle="pill" data-target="#pills-fonesestragados" role="tab" aria-controls="pills-fonesestragados" aria-selected="false">Estragados</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link" id="pills-fonesconcerto-tab" data-toggle="pill" data-target="#pills-fonesconcerto" role="tab" aria-controls="pills-fonesconcerto" aria-selected="false">Concerto</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-fonesdisponibles" role="tabpanel" aria-labelledby="pills-fonesdisponibles-tab">
                  <!-- Tabla fone disponible -->
                  <div class="table-responsive">
                    <table class="table table-striped mb-4">
                      <thead>
                        <tr class="text-center">
                          <th>CADASTRO</th>
                          <th>MARCA</th>
                          <th>CÓDIGO</th>
                          <th>LACRE</th>
                          <th>ESTADO</th>
                          <th>ANOTAÇÕES</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($data['ultimosFonesDisponibles']) {
                          foreach ($data['ultimosFonesDisponibles'] as $ultimosDisponibles)
                          {
                            if($ultimosDisponibles['codigo'] === '') {
                              $ultimosDisponibles['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                            }

                            switch ($ultimosDisponibles['status']) {
                              case '1':
                                $trEstado = '<h5><span class="badge badge-success">Disponível</span></h5>';
                                break;
                              case '2':
                                $trEstado = '<h5><span class="badge badge-info">Em Uso</span></h5>';
                                break;
                              case '3':
                                $trEstado = '<h5><span class="badge badge-danger">Estragado</span></h5>';
                                break;
                              default:
                                $trEstado = '<h5><span class="badge badge-warning">Concerto</span></h5>';
                                break;
                            }

                            $ultimosDisponibles['datecreated'] = date("d-m-Y", strtotime($ultimosDisponibles['datecreated']));

                            $btnAnnotation = '<button 
                                                  class="btn btn-secondary" 
                                                  onClick="fntViewAnnotation('.$ultimosDisponibles['idequipamento'].', '.MFONE.')" 
                                                  title="Ver Anotações">
                                                <i class="fa fa-file-text" style="margin-right: 0"></i>
                                              </button>';
                        ?>
                            <tr class="text-center">
                              <td><?= $ultimosDisponibles['datecreated']; ?></td>
                              <td><?= $ultimosDisponibles['marca']; ?></td>
                              <td><?= $ultimosDisponibles['codigo']; ?></td>
                              <td><?= '#'.$ultimosDisponibles['lacre']; ?></td>
                              <td><?= $trEstado; ?></td>
                              <td><?= $btnAnnotation; ?></td>
                            </tr>
                        <?php
                          }
                        } else {
                        ?>
                          <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchFone()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Fone</button>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-fonesuso" role="tabpanel" aria-labelledby="pills-fonesuso-tab">
                  <!-- Tabla fone en uso -->
                  <div class="table-responsive">
                    <table class="table table-striped mb-4">
                      <thead>
                        <tr class="text-center">
                          <th>CADASTRO</th>
                          <th>MARCA</th>
                          <th>CÓDIGO</th>
                          <th>LACRE</th>
                          <th>ESTADO</th>
                          <th>ANOTAÇÕES</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($data['ultimosFonesUso']) {
                          foreach ($data['ultimosFonesUso'] as $ultimosUso)
                          {
                            if($ultimosUso['codigo'] === '') {
                              $ultimosUso['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                            }

                            switch ($ultimosUso['status']) {
                              case '1':
                                $trEstado = '<h5><span class="badge badge-success">Disponível</span></h5>';
                                break;
                              case '2':
                                $trEstado = '<h5><span class="badge badge-info">Em Uso</span></h5>';
                                break;
                              case '3':
                                $trEstado = '<h5><span class="badge badge-danger">Estragado</span></h5>';
                                break;
                              default:
                                $trEstado = '<h5><span class="badge badge-warning">Concerto</span></h5>';
                                break;
                            }

                            $ultimosUso['datecreated'] = date("d-m-Y", strtotime($ultimosUso['datecreated']));

                            $btnAnnotation = '<button 
                                                  class="btn btn-secondary" 
                                                  onClick="fntViewAnnotation('.$ultimosUso['idequipamento'].', '.MFONE.')" 
                                                  title="Ver Anotações">
                                                <i class="fa fa-file-text" style="margin-right: 0"></i>
                                              </button>';
                        ?>
                            <tr class="text-center">
                              <td><?= $ultimosUso['datecreated']; ?></td>
                              <td><?= $ultimosUso['marca']; ?></td>
                              <td><?= $ultimosUso['codigo']; ?></td>
                              <td><?= '#'.$ultimosUso['lacre']; ?></td>
                              <td><?= $trEstado; ?></td>
                              <td><?= $btnAnnotation; ?></td>
                            </tr>
                        <?php
                          }
                        } else {
                        ?>
                          <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchFone()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Fone</button>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-fonesestragados" role="tabpanel" aria-labelledby="pills-fonesestragados-tab">
                  <!-- Tabla fone estragados -->
                  <div class="table-responsive">
                    <table class="table table-striped mb-4">
                      <thead>
                        <tr class="text-center">
                          <th>CADASTRO</th>
                          <th>MARCA</th>
                          <th>CÓDIGO</th>
                          <th>LACRE</th>
                          <th>ESTADO</th>
                          <th>ANOTAÇÕES</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($data['ultimosFonesEstragados']) {
                          foreach ($data['ultimosFonesEstragados'] as $ultimosEstragados)
                          {
                            if($ultimosEstragados['codigo'] === '') {
                              $ultimosEstragados['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                            }

                            switch ($ultimosEstragados['status']) {
                              case '1':
                                $trEstado = '<h5><span class="badge badge-success">Disponível</span></h5>';
                                break;
                              case '2':
                                $trEstado = '<h5><span class="badge badge-info">Em Uso</span></h5>';
                                break;
                              case '3':
                                $trEstado = '<h5><span class="badge badge-danger">Estragado</span></h5>';
                                break;
                              default:
                                $trEstado = '<h5><span class="badge badge-warning">Concerto</span></h5>';
                                break;
                            }

                            $ultimosEstragados['datecreated'] = date("d-m-Y", strtotime($ultimosEstragados['datecreated']));

                            $btnAnnotation = '<button 
                                                  class="btn btn-secondary" 
                                                  onClick="fntViewAnnotation('.$ultimosEstragados['idequipamento'].', '.MFONE.')" 
                                                  title="Ver Anotações">
                                                <i class="fa fa-file-text" style="margin-right: 0"></i>
                                              </button>';
                        ?>
                            <tr class="text-center">
                              <td><?= $ultimosEstragados['datecreated']; ?></td>
                              <td><?= $ultimosEstragados['marca']; ?></td>
                              <td><?= $ultimosEstragados['codigo']; ?></td>
                              <td><?= '#'.$ultimosEstragados['lacre']; ?></td>
                              <td><?= $trEstado; ?></td>
                              <td><?= $btnAnnotation; ?></td>
                            </tr>
                        <?php
                          }
                        } else {
                        ?>
                          <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchFone()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Fone</button>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-fonesconcerto" role="tabpanel" aria-labelledby="pills-fonesconcerto-tab">
                  <!-- Tabla fone en concerto -->
                  <div class="table-responsive">
                    <table class="table table-striped mb-4">
                      <thead>
                        <tr class="text-center">
                          <th>CADASTRO</th>
                          <th>MARCA</th>
                          <th>CÓDIGO</th>
                          <th>LACRE</th>
                          <th>ESTADO</th>
                          <th>ANOTAÇÕES</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        if($data['ultimosFonesConcerto']) {
                          foreach ($data['ultimosFonesConcerto'] as $ultimosConcerto)
                          {
                            if($ultimosConcerto['codigo'] === '') {
                              $ultimosConcerto['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                            }

                            switch ($ultimosConcerto['status']) {
                              case '1':
                                $trEstado = '<h5><span class="badge badge-success">Disponível</span></h5>';
                                break;
                              case '2':
                                $trEstado = '<h5><span class="badge badge-info">Em Uso</span></h5>';
                                break;
                              case '3':
                                $trEstado = '<h5><span class="badge badge-danger">Estragado</span></h5>';
                                break;
                              default:
                                $trEstado = '<h5><span class="badge badge-warning">Concerto</span></h5>';
                                break;
                            }

                            $ultimosConcerto['datecreated'] = date("d-m-Y", strtotime($ultimosConcerto['datecreated']));

                            $btnAnnotation = '<button 
                                                  class="btn btn-secondary" 
                                                  onClick="fntViewAnnotation('.$ultimosConcerto['idequipamento'].', '.MFONE.')" 
                                                  title="Ver Anotações">
                                                <i class="fa fa-file-text" style="margin-right: 0"></i>
                                              </button>';
                        ?>
                            <tr class="text-center">
                              <td><?= $ultimosConcerto['datecreated']; ?></td>
                              <td><?= $ultimosConcerto['marca']; ?></td>
                              <td><?= $ultimosConcerto['codigo']; ?></td>
                              <td><?= '#'.$ultimosConcerto['lacre']; ?></td>
                              <td><?= $trEstado; ?></td>
                              <td><?= $btnAnnotation; ?></td>
                            </tr>
                        <?php
                          }
                        } else {
                        ?>
                          <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                        <?php } ?>
                      </tbody>
                    </table>
                    <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchFone()"><i class="fa fa-search" aria-hidden="true"></i> Procurar Fone</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- div Computadores -->
            <div class="tab-pane fade" id="maquinas" role="tabpanel" aria-labelledby="maquinas-tab">
              <div class="tab-pane fade show active" id="maquinas" role="tabpanel" aria-labelledby="maquinas-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab-maquinas" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link active" id="pills-maquinasdisponibles-tab" data-toggle="pill" data-target="#pills-maquinasdisponibles" role="tab" aria-controls="pills-maquinasdisponibles" aria-selected="true">Disponíveis</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-maquinasuso-tab" data-toggle="pill" data-target="#pills-maquinasuso" role="tab" aria-controls="pills-maquinasuso" aria-selected="false">Em Uso</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-maquinasestragados-tab" data-toggle="pill" data-target="#pills-maquinasestragados" role="tab" aria-controls="pills-maquinasestragados" aria-selected="false">Estragados</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-maquinasconcerto-tab" data-toggle="pill" data-target="#pills-maquinasconcerto" role="tab" aria-controls="pills-maquinasconcerto" aria-selected="false">Concerto</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-maquinasdisponibles" role="tabpanel" aria-labelledby="pills-maquinasdisponibles-tab">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr class="text-center">
                            <th>CADASTRO</th>
                            <th>MARCA</th>
                            <th>CÓDIGO / SERIAL</th>
                            <th>PATRIMÔNIO</th>
                            <th>ESTADO</th>
                            <th>ANOTAÇÕES</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            if($data['ultimasMaquinasDisponibles']) {
                              foreach ($data['ultimasMaquinasDisponibles'] as $ultimosDisponibles)
                              {
                                if($ultimosDisponibles['codigo'] === '') {
                                  $ultimosDisponibles['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                                }

                                switch ($ultimosDisponibles['status']) {
                                  case '1':
                                    $trEstado = '<h5><span class="badge badge-success">Disponível</span></h5>';
                                    break;
                                  case '2':
                                    $trEstado = '<h5><span class="badge badge-info">Em Uso</span></h5>';
                                    break;
                                  case '3':
                                    $trEstado = '<h5><span class="badge badge-danger">Estragado</span></h5>';
                                    break;
                                  default:
                                    $trEstado = '<h5><span class="badge badge-warning">Concerto</span></h5>';
                                    break;
                                }

                                $ultimosDisponibles['datecreated'] = date("d-m-Y", strtotime($ultimosDisponibles['datecreated']));

                                $btnAnnotation = '<button 
                                                      class="btn btn-secondary" 
                                                      onClick="fntViewAnnotation('.$ultimosDisponibles['idequipamento'].', '.MCOMPUTADOR.')" 
                                                      title="Ver Anotações">
                                                    <i class="fa fa-file-text" style="margin-right: 0"></i>
                                                  </button>';
                            ?>
                                <tr class="text-center">
                                  <td><?= $ultimosDisponibles['datecreated']; ?></td>
                                  <td><?= $ultimosDisponibles['marca']; ?></td>
                                  <td><?= $ultimosDisponibles['codigo']; ?></td>
                                  <td><?= '#'.$ultimosDisponibles['lacre']; ?></td>
                                  <td><?= $trEstado; ?></td>
                                  <td><?= $btnAnnotation; ?></td>
                                </tr>
                            <?php
                              }
                            } else {
                          ?>
                            <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- div Monitores -->
            <div class="tab-pane fade" id="monitores" role="tabpanel" aria-labelledby="monitores-tab">
              <p>Monitores</p>
            </div>
            <!-- div Teclados -->
            <div class="tab-pane fade" id="teclados" role="tabpanel" aria-labelledby="teclados-tab">
              <p>Teclados</p>
            </div>
            <!-- div Mouses -->
            <div class="tab-pane fade" id="mouses" role="tabpanel" aria-labelledby="mouses-tab">
              <p>Mouses</p>
            </div>
          </div>
        </div>
      </div>

    </main>
<?php footerAdmin($data); ?>
