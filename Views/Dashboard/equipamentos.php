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

        <!-- Total de equipamentos -->
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

        </div>

        <!-- informacion general de equipamentos -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center mb-4">INFORMAÇÃO RECENTE</h3>

          <ul class="nav nav-tabs mb-5" id="equipamentosTab" role="tablist">
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link active" id="fones-tab" data-toggle="tab" data-target="#fones" role="tab" aria-controls="fones" aria-selected="true">FONES</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="mouses-tab" data-toggle="tab" data-target="#mouses" role="tab" aria-controls="mouses" aria-selected="true">MOUSES</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="teclados-tab" data-toggle="tab" data-target="#teclados" role="tab" aria-controls="teclados" aria-selected="true">TECLADOS</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="monitores-tab" data-toggle="tab" data-target="#monitores" role="tab" aria-controls="monitores" aria-selected="true">MONITORES</a>
            </li>
            <li class="nav-item" role="presentation">
              <a href="#" class="nav-link" id="maquinas-tab" data-toggle="tab" data-target="#maquinas" role="tab" aria-controls="maquinas" aria-selected="true">COMPUTADORES</a>
            </li>
          </ul>
          <div class="tab-content" id="fonesTabContent">
            <!-- div Fones -->
            <div class="tab-pane fade show active" id="fones" role="tabpanel" aria-labelledby="fones-tab">
              <ul class="nav nav-pills mb-3" id="pills-tab-fones" role="tablist">
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link active" id="pills-fonesdisponibles-tab" data-toggle="pill" data-target="#pills-fonesdisponibles" role="tab" aria-controls="pills-fonesdisponibles" aria-selected="true">
                    <i class="fa fa-headphones mr-1"></i>Disponíveis
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link" id="pills-fonesuso-tab" data-toggle="pill" data-target="#pills-fonesuso" role="tab" aria-controls="pills-fonesuso" aria-selected="false">
                    <i class="fa fa-headphones mr-1"></i>Em Uso
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link" id="pills-fonesestragados-tab" data-toggle="pill" data-target="#pills-fonesestragados" role="tab" aria-controls="pills-fonesestragados" aria-selected="false">
                    <i class="fa fa-headphones mr-1"></i>Estragados
                  </a>
                </li>
                <li class="nav-item" role="presentation">
                  <a href="#" class="nav-link" id="pills-fonesconcerto-tab" data-toggle="pill" data-target="#pills-fonesconcerto" role="tab" aria-controls="pills-fonesconcerto" aria-selected="false">
                    <i class="fa fa-headphones mr-1"></i>Concerto
                  </a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <!-- Tabla fone disponible -->
                <div class="tab-pane fade show active" id="pills-fonesdisponibles" role="tabpanel" aria-labelledby="pills-fonesdisponibles-tab">
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

                <!-- Tabla fone en uso -->
                <div class="tab-pane fade" id="pills-fonesuso" role="tabpanel" aria-labelledby="pills-fonesuso-tab">
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

                <!-- Tabla fone estragados -->
                <div class="tab-pane fade" id="pills-fonesestragados" role="tabpanel" aria-labelledby="pills-fonesestragados-tab">
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

                <!-- Tabla fone en concerto -->
                <div class="tab-pane fade" id="pills-fonesconcerto" role="tabpanel" aria-labelledby="pills-fonesconcerto-tab">
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
                    <a href="#" class="nav-link active" id="pills-maquinasDisponibles-tab" data-toggle="pill" data-target="#pills-maquinasDisponibles" role="tab" aria-controls="pills-maquinasDisponibles" aria-selected="true">
                      <i class="fa fa-windows mr-1"></i>Disponíveis
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-maquinasUso-tab" data-toggle="pill" data-target="#pills-maquinasUso" role="tab" aria-controls="pills-maquinasUso" aria-selected="false">
                      <i class="fa fa-windows mr-1"></i>Em Uso
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-maquinasEstragadas-tab" data-toggle="pill" data-target="#pills-maquinasEstragadas" role="tab" aria-controls="pills-maquinasEstragadas" aria-selected="false">
                      <i class="fa fa-windows mr-1"></i>Estragados
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-maquinasConcerto-tab" data-toggle="pill" data-target="#pills-maquinasConcerto" role="tab" aria-controls="pills-maquinasConcerto" aria-selected="false">
                      <i class="fa fa-windows mr-1"></i>Concerto
                    </a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <!-- Tabla Máquina Disponibles -->
                  <div class="tab-pane fade show active" id="pills-maquinasDisponibles" role="tabpanel" aria-labelledby="pills-maquinasDisponibles-tab">
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
                  
                  <!-- Tabla Máquina en uso -->
                  <div class="tab-pane fade" id="pills-maquinasUso" role="tabpanel" aria-labelledby="pills-maquinasUso-tab">
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
                            if($data['ultimasMaquinasUso']) {
                              foreach ($data['ultimasMaquinasUso'] as $ultimosUso)
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
                                                      onClick="fntViewAnnotation('.$ultimosUso['idequipamento'].', '.MCOMPUTADOR.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Máquina Estragadas -->
                  <div class="tab-pane fade" id="pills-maquinasEstragadas" role="tabpanel" aria-labelledby="pills-maquinasEstragadas-tab">
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
                            if($data['ultimasMaquinasEstragadas']) {
                              foreach ($data['ultimasMaquinasEstragadas'] as $ultimosEstragadas)
                              {
                                if($ultimosEstragadas['codigo'] === '') {
                                  $ultimosEstragadas['codigo'] = '<span class="font-italic text-secondary">nenhum</span>';
                                }

                                switch ($ultimosEstragadas['status']) {
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

                                $ultimosEstragadas['datecreated'] = date("d-m-Y", strtotime($ultimosEstragadas['datecreated']));

                                $btnAnnotation = '<button 
                                                      class="btn btn-secondary" 
                                                      onClick="fntViewAnnotation('.$ultimosEstragadas['idequipamento'].', '.MCOMPUTADOR.')" 
                                                      title="Ver Anotações">
                                                    <i class="fa fa-file-text" style="margin-right: 0"></i>
                                                  </button>';
                            ?>
                                <tr class="text-center">
                                  <td><?= $ultimosEstragadas['datecreated']; ?></td>
                                  <td><?= $ultimosEstragadas['marca']; ?></td>
                                  <td><?= $ultimosEstragadas['codigo']; ?></td>
                                  <td><?= '#'.$ultimosEstragadas['lacre']; ?></td>
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

                  <!-- Tabla Máquina en Concerto -->
                  <div class="tab-pane fade" id="pills-maquinasConcerto" role="tabpanel" aria-labelledby="pills-maquinasConcerto-tab">
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
                            if($data['ultimasMaquinasConcerto']) {
                              foreach ($data['ultimasMaquinasConcerto'] as $ultimosConcerto)
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
                                                      onClick="fntViewAnnotation('.$ultimosConcerto['idequipamento'].', '.MCOMPUTADOR.')" 
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- div Monitores -->
            <div class="tab-pane fade" id="monitores" role="tabpanel" aria-labelledby="monitores-tab">
              <div class="tab-pane fade show active" id="monitores" role="tabpanel" aria-labelledby="monitores-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab-monitores" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link active" id="pills-monitoresDisponibles-tab" data-toggle="pill" data-target="#pills-monitoresDisponibles" role="tab" aria-controls="pills-monitoresDisponibles" aria-selected="true">
                      <i class="fa fa-television mr-1"></i>Disponíveis
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-monitoresUso-tab" data-toggle="pill" data-target="#pills-monitoresUso" role="tab" aria-controls="pills-monitoresUso" aria-selected="false">
                      <i class="fa fa-television mr-1"></i>Em Uso
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-monitoresEstragados-tab" data-toggle="pill" data-target="#pills-monitoresEstragados" role="tab" aria-controls="pills-monitoresEstragados" aria-selected="false">
                      <i class="fa fa-television mr-1"></i>Estragados
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-monitoresConcerto-tab" data-toggle="pill" data-target="#pills-monitoresConcerto" role="tab" aria-controls="pills-monitoresConcerto" aria-selected="false">
                      <i class="fa fa-television mr-1"></i>Concerto
                    </a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <!-- Tabla Monitores Disponibles -->
                  <div class="tab-pane fade show active" id="pills-monitoresDisponibles" role="tabpanel" aria-labelledby="pills-monitoresDisponibles-tab">
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
                            if($data['ultimosMonitoresDisponibles']) {
                              foreach ($data['ultimosMonitoresDisponibles'] as $ultimosDisponibles)
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
                                                      onClick="fntViewAnnotation('.$ultimosDisponibles['idequipamento'].', '.MTELA.')" 
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

                  <!-- Tabla Monitores en Uso -->
                  <div class="tab-pane fade" id="pills-monitoresUso" role="tabpanel" aria-labelledby="pills-monitoresUso-tab">
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
                            if($data['ultimosMonitoresUso']) {
                              foreach ($data['ultimosMonitoresUso'] as $ultimosUso)
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
                                                      onClick="fntViewAnnotation('.$ultimosUso['idequipamento'].', '.MTELA.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Monitores Estragados -->
                  <div class="tab-pane fade" id="pills-monitoresEstragados" role="tabpanel" aria-labelledby="pills-monitoresEstragados-tab">
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
                            if($data['ultimosMonitoresEstragados']) {
                              foreach ($data['ultimosMonitoresEstragados'] as $ultimosEstragados)
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
                                                      onClick="fntViewAnnotation('.$ultimosEstragados['idequipamento'].', '.MTELA.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Monitores en Concerto -->
                  <div class="tab-pane fade" id="pills-monitoresConcerto" role="tabpanel" aria-labelledby="pills-monitoresConcerto-tab">
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
                            if($data['ultimosMonitoresConcerto']) {
                              foreach ($data['ultimosMonitoresConcerto'] as $ultimosConcerto)
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
                                                      onClick="fntViewAnnotation('.$ultimosConcerto['idequipamento'].', '.MTELA.')" 
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
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- div Teclados -->
            <div class="tab-pane fade" id="teclados" role="tabpanel" aria-labelledby="teclados-tab">
              <div class="tab-pane fade show active" id="teclados" role="tabpanel" aria-labelledby="teclados-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab-teclados" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link active" id="pills-tecladosDisponibles-tab" data-toggle="pill" data-target="#pills-tecladosDisponibles" role="tab" aria-controls="pills-tecladosDisponibles" aria-selected="true">
                      <i class="fa fa-keyboard mr-1"></i>Disponíveis
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-tecladosUso-tab" data-toggle="pill" data-target="#pills-tecladosUso" role="tab" aria-controls="pills-tecladosUso" aria-selected="false">
                      <i class="fa fa-keyboard mr-1"></i>Em Uso
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-tecladosEstragados-tab" data-toggle="pill" data-target="#pills-tecladosEstragados" role="tab" aria-controls="pills-tecladosEstragados" aria-selected="false">
                      <i class="fa fa-keyboard mr-1"></i>Estragados
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-tecladosConcerto-tab" data-toggle="pill" data-target="#pills-tecladosConcerto" role="tab" aria-controls="pills-tecladosConcerto" aria-selected="false">
                      <i class="fa fa-keyboard mr-1"></i>Concerto
                    </a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <!-- Tabla Teclados Disponibles -->
                  <div class="tab-pane fade show active" id="pills-tecladosDisponibles" role="tabpanel" aria-labelledby="pills-tecladosDisponibles-tab">
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
                            if($data['ultimosTecladosDisponibles']) {
                              foreach ($data['ultimosTecladosDisponibles'] as $ultimosDisponibles)
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
                                                      onClick="fntViewAnnotation('.$ultimosDisponibles['idequipamento'].', '.MTECLADO.')" 
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

                  <!-- Tabla Teclados en Uso -->
                  <div class="tab-pane fade" id="pills-tecladosUso" role="tabpanel" aria-labelledby="pills-tecladosUso-tab">
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
                            if($data['ultimosTecladosUso']) {
                              foreach ($data['ultimosTecladosUso'] as $ultimosUso)
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
                                                      onClick="fntViewAnnotation('.$ultimosUso['idequipamento'].', '.MTECLADO.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Teclados Estragados -->
                  <div class="tab-pane fade" id="pills-tecladosEstragados" role="tabpanel" aria-labelledby="pills-tecladosEstragados-tab">
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
                            if($data['ultimosTecladosEstragados']) {
                              foreach ($data['ultimosTecladosEstragados'] as $ultimosEstragados)
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
                                                      onClick="fntViewAnnotation('.$ultimosEstragados['idequipamento'].', '.MTECLADO.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Teclados Concerto -->
                  <div class="tab-pane fade" id="pills-tecladosConcerto" role="tabpanel" aria-labelledby="pills-tecladosConcerto-tab">
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
                            if($data['ultimosTecladosConcerto']) {
                              foreach ($data['ultimosTecladosConcerto'] as $ultimosConcerto)
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
                                                      onClick="fntViewAnnotation('.$ultimosConcerto['idequipamento'].', '.MTECLADO.')" 
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
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- div Mouses -->
            <div class="tab-pane fade" id="mouses" role="tabpanel" aria-labelledby="mouses-tab">
              <div class="tab-pane fade show active" id="mouses" role="tabpanel" aria-labelledby="mouses-tab">
                <ul class="nav nav-pills mb-3" id="pills-tab-mouses" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link active" id="pills-mousesDisponibles-tab" data-toggle="pill" data-target="#pills-mousesDisponibles" role="tab" aria-controls="pills-mousesDisponibles" aria-selected="true">
                      <i class="fa fa-mouse mr-1"></i>Disponíveis
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-mousesUso-tab" data-toggle="pill" data-target="#pills-mousesUso" role="tab" aria-controls="pills-mousesUso" aria-selected="false">
                      <i class="fa fa-mouse mr-1"></i>Em Uso
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-mousesEstragados-tab" data-toggle="pill" data-target="#pills-mousesEstragados" role="tab" aria-controls="pills-mousesEstragados" aria-selected="false">
                      <i class="fa fa-mouse mr-1"></i>Estragados
                    </a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a href="#" class="nav-link" id="pills-mousesConcerto-tab" data-toggle="pill" data-target="#pills-mousesConcerto" role="tab" aria-controls="pills-mousesConcerto" aria-selected="false">
                      <i class="fa fa-mouse mr-1"></i>Concerto
                    </a>
                  </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                  <!-- Tabla Mouses Disponibles -->
                  <div class="tab-pane fade show active" id="pills-mousesDisponibles" role="tabpanel" aria-labelledby="pills-mousesDisponibles-tab">
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
                            if($data['ultimosMousesDisponibles']) {
                              foreach ($data['ultimosMousesDisponibles'] as $ultimosDisponibles)
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
                                                      onClick="fntViewAnnotation('.$ultimosDisponibles['idequipamento'].', '.MTECLADO.')" 
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

                  <!-- Tabla Mouses Uso -->
                  <div class="tab-pane fade" id="pills-mousesUso" role="tabpanel" aria-labelledby="pills-mousesUso-tab">
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
                            if($data['ultimosMousesUso']) {
                              foreach ($data['ultimosMousesUso'] as $ultimosUso)
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
                                                      onClick="fntViewAnnotation('.$ultimosUso['idequipamento'].', '.MMOUSE.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Mouses Estragados -->
                  <div class="tab-pane fade" id="pills-mousesEstragados" role="tabpanel" aria-labelledby="pills-mousesEstragados-tab">
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
                            if($data['ultimosMousesEstragados']) {
                              foreach ($data['ultimosMousesEstragados'] as $ultimosEstragados)
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
                                                      onClick="fntViewAnnotation('.$ultimosEstragados['idequipamento'].', '.MTECLADO.')" 
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
                    </div>
                  </div>

                  <!-- Tabla Mouses Concerto -->
                  <div class="tab-pane fade" id="pills-mousesConcerto" role="tabpanel" aria-labelledby="pills-mousesConcerto-tab">
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
                            if($data['ultimosMousesConcerto']) {
                              foreach ($data['ultimosMousesConcerto'] as $ultimosConcerto)
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
                                                      onClick="fntViewAnnotation('.$ultimosConcerto['idequipamento'].', '.MTECLADO.')" 
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
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráficas de Equipamentos -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center mb-5">GRÁFICO DE EQUIPAMENTOS</h3>
          <ul class="nav nav-tabs mb-3" id="pills-tabGraficoE" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-graficoFones-tab" data-toggle="pill" href="#pills-graficoFones" role="tab" aria-controls="pills-graficofones" aria-selected="true">FONES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoMouses-tab" data-toggle="pill" href="#pills-graficoMouses" role="tab" aria-controls="pills-graficomouses" aria-selected="false">MOUSES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoTeclados-tab" data-toggle="pill" href="#pills-graficoTeclados" role="tab" aria-controls="pills-graficoteclados" aria-selected="false">TECLADOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoMonitores-tab" data-toggle="pill" href="#pills-graficoMonitores" role="tab" aria-controls="pills-graficoMonitores" aria-selected="false">MONITORES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoComputadores-tab" data-toggle="pill" href="#pills-graficoComputadores" role="tab" aria-controls="pills-graficoComputadores" aria-selected="false">COMPUTADORES</a>
            </li>
          </ul>


          <div class="tab-content" id="pills-tabGraficoContent">
            <!-- Gráfica Fones -->
            <div class="tab-pane fade show active" id="pills-graficoFones" role="tabpanel" aria-labelledby="pills-graficoFones-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker fonesMes" name="fonesMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchFonesMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesFones"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </main>
<?php footerAdmin($data); ?>

<script>
  // Gráfica de usuarios activos
  Highcharts.chart('graficaMesFones', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Fones Cadastrados <?= $data['fonesMDia']['mes'].' de '.$data['fonesMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['fonesMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['fonesMDia']['equipamentos'] as $dia) {
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
            foreach ($data['fonesMDia']['equipamentos'] as $equipamento) {
              echo $equipamento['equipamento'].",";
            }
          ?>
        ]
    }]
  });
</script>
