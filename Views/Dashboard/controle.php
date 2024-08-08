<?php headerAdmin($data); getModal('modalDashboard',$data);?>
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
      <!-- total de entregas y trocas -->
        <div class="row">
          <!-- Entregas -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/entregar" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-check fa-3x"></i>
                <div class="info">
                  <h4>Entregas</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['entregas']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Trocas -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-exchange fa-3x"></i>
                <div class="info">
                  <h4>Trocas</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['trocas']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Desligados -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>Desligados(as)</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['desligados']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Pediu conta -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>Pediu conta</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['pediuConta']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Sem Renovação -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>Sem Renovação</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['semRenovacao']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Justa Causa -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>Justa Causa</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['justaCausa']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Rescisão -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>Rescisão</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['rescisão']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- INSS -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>INSS</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['INSS']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

          <!-- Licença Maternidade -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/receber" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
                <div class="info">
                  <h4>Licença Maternidade</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['maternidade']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

        </div>

        <!-- informacion reciente de los controles -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center mb-4">INFORMAÇÃO RECENTE</h3>

          <ul class="nav nav-tabs mb-3" id="pills-controle" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-entregas-tab" data-toggle="pill" href="#pills-entregas" role="tab" aria-controls="pills-entregas" aria-selected="true">ENTREGAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-trocas-tab" data-toggle="pill" href="#pills-trocas" role="tab" aria-controls="pills-trocas" aria-selected="false">TROCAS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-desligados-tab" data-toggle="pill" href="#pills-desligados" role="tab" aria-controls="pills-desligados" aria-selected="false">DESLIGADOS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-pediuConta-tab" data-toggle="pill" href="#pills-pediuConta" role="tab" aria-controls="pills-pediuConta" aria-selected="false">PEDIU CONTA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-semRenovacao-tab" data-toggle="pill" href="#pills-semRenovacao" role="tab" aria-controls="pills-semRenovacao" aria-selected="false">SEM RENOVAÇÃO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-justaCausa-tab" data-toggle="pill" href="#pills-justaCausa" role="tab" aria-controls="pills-justaCausa" aria-selected="false">JUSTA CAUSA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-rescisão-tab" data-toggle="pill" href="#pills-rescisão" role="tab" aria-controls="pills-rescisão" aria-selected="false">RESCISÃO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-inss-tab" data-toggle="pill" href="#pills-inss" role="tab" aria-controls="pills-inss" aria-selected="false">INSS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-maternidade-tab" data-toggle="pill" href="#pills-maternidade" role="tab" aria-controls="pills-maternidade" aria-selected="false">LICENÇA MATERNINDADE</a>
              </li>
            </ul>

          <div class="tab-content" id="controleTabContent">
            <!-- div Entregas -->
            <div class="tab-pane fade show active" id="pills-entregas" role="tabpanel" aria-labelledby="pills-entregas-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <!-- <th>AÇÕES</th> -->
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimasEntregas']) {
                      foreach ($data['ultimasEntregas'] as $ultimasEntregas)
                      {
                        $ultimasEntregas['datecreated'] = date("d-m-Y", strtotime($ultimasEntregas['datecreated']));

                        $ultimasEntregas['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimasEntregas['lacre'].'</span></h6>';

                        $protocolo = getProtocolo($ultimasEntregas['equipamentoid'], 1);
                        
                        if($ultimasEntregas['protocolo']) {
                          $ultimasEntregas['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimasEntregas['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }
                        
                        $ultimasEntregas['nombres'] = formatName($ultimasEntregas['nombres'], $ultimasEntregas['apellidos']);
                        
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimasEntregas['datecreated']; ?></td>
                          <td><?= $ultimasEntregas['protocolo']; ?></td>
                          <td><?= $ultimasEntregas['lacre']; ?></td>
                          <td><?= $ultimasEntregas['matricula']; ?></td>
                          <td><?= $ultimasEntregas['nombres']; ?></td>
                          <!--<td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimasEntregas['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>-->
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchEntregas()"><i class="fa fa-search" aria-hidden="true"></i> Entregas</button>
              </div>
            </div>

            <!-- div Trocas -->
            <div class="tab-pane fade" id="pills-trocas" role="tabpanel" aria-labelledby="trocas-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimasTrocas']) {
                      foreach ($data['ultimasTrocas'] as $ultimasTrocas)
                      {
                        $ultimasTrocas['datecreated'] = date("d-m-Y", strtotime($ultimasTrocas['datecreated']));

                        $ultimasTrocas['lacre'] = '<h6>Fone: <span class="badge badge-secondary p-1 ">#'.$ultimasTrocas['lacre'].'</span></h5>';

                        $protocolo = getProtocolo($ultimasTrocas['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimasTrocas['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimasTrocas['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }
                                      
                        $ultimasTrocas['nombres'] = formatName($ultimasTrocas['nombres'], $ultimasTrocas['apellidos']);
                        
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimasTrocas['datecreated']; ?></td>
                          <td><?= $ultimasTrocas['protocolo']; ?></td>
                          <td><?= $ultimasTrocas['lacre']; ?></td>
                          <td><?= $ultimasTrocas['matricula']; ?></td>
                          <td><?= $ultimasTrocas['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimasTrocas['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchTrocas()"><i class="fa fa-search" aria-hidden="true"></i> Trocas</button>
              </div>
            </div>

            <!-- div Desligados -->
            <div class="tab-pane fade" id="pills-desligados" role="tabpanel" aria-labelledby="desligados-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosDesligamentos']) {
                      foreach ($data['ultimosDesligamentos'] as $ultimosDesligamentos)
                      {
                        $ultimosDesligamentos['datecreated'] = date("d-m-Y", strtotime($ultimosDesligamentos['datecreated']));

                        $ultimosDesligamentos['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosDesligamentos['lacre'].'</span></h5>';

                        $protocolo = getProtocolo($ultimosDesligamentos['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosDesligamentos['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosDesligamentos['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }

                        $ultimosDesligamentos['nombres'] = formatName($ultimosDesligamentos['nombres'], $ultimosDesligamentos['apellidos']);                      
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosDesligamentos['datecreated']; ?></td>
                          <td><?= $ultimosDesligamentos['protocolo']; ?></td>
                          <td><?= $ultimosDesligamentos['lacre']; ?></td>
                          <td><?= $ultimosDesligamentos['matricula']; ?></td>
                          <td><?= $ultimosDesligamentos['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosDesligamentos['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchDesligados()"><i class="fa fa-search" aria-hidden="true"></i> Desligados(as)</button>
              </div>
            </div>
            <!-- div pediu conta -->
            <div class="tab-pane fade" id="pills-pediuConta" role="tabpanel" aria-labelledby="pediuConta-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosPediuConta']) {
                      foreach ($data['ultimosPediuConta'] as $ultimosPediuConta)
                      {
                        $ultimosPediuConta['datecreated'] = date("d-m-Y", strtotime($ultimosPediuConta['datecreated']));

                        $ultimosPediuConta['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosPediuConta['lacre'].'</span></h5>';

                        $protocolo = getProtocolo($ultimosPediuConta['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosPediuConta['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosPediuConta['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }

                        $ultimosPediuConta['nombres'] = formatName($ultimosPediuConta['nombres'], $ultimosPediuConta['apellidos']);
                                              
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosPediuConta['datecreated']; ?></td>
                          <td><?= $ultimosPediuConta['protocolo']; ?></td>
                          <td><?= $ultimosPediuConta['lacre']; ?></td>
                          <td><?= $ultimosPediuConta['matricula']; ?></td>
                          <td><?= $ultimosPediuConta['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosPediuConta['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchPediuConta()"><i class="fa fa-search" aria-hidden="true"></i> Pediu Conta</button>
              </div>
            </div>

            <!-- div sem renovação -->
            <div class="tab-pane fade" id="pills-semRenovacao" role="tabpanel" aria-labelledby="semRenovacao-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosSemRenovacao']) {
                      foreach ($data['ultimosSemRenovacao'] as $ultimosSemRenovacao)
                      {
                        $ultimosSemRenovacao['datecreated'] = date("d-m-Y", strtotime($ultimosSemRenovacao['datecreated']));

                        $ultimosSemRenovacao['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosSemRenovacao['lacre'].'</span></h5>';

                        $protocolo = getProtocolo($ultimosSemRenovacao['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosSemRenovacao['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosSemRenovacao['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }
                        
                        $ultimosSemRenovacao['nombres'] = formatName($ultimosSemRenovacao['nombres'], $ultimosSemRenovacao['apellidos']);
                                              
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosSemRenovacao['datecreated']; ?></td>
                          <td><?= $ultimosSemRenovacao['protocolo']; ?></td>
                          <td><?= $ultimosSemRenovacao['lacre']; ?></td>
                          <td><?= $ultimosSemRenovacao['matricula']; ?></td>
                          <td><?= $ultimosSemRenovacao['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosSemRenovacao['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchSemRenovacao()"><i class="fa fa-search" aria-hidden="true"></i> Sem Renovação</button>
              </div>
            </div>

            <!-- div Justa causa renovação -->
            <div class="tab-pane fade" id="pills-justaCausa" role="tabpanel" aria-labelledby="justaCausa-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosJustaCausa']) {
                      foreach ($data['ultimosJustaCausa'] as $ultimosJustaCausa)
                      {
                        $ultimosJustaCausa['datecreated'] = date("d-m-Y", strtotime($ultimosJustaCausa['datecreated']));

                        $ultimosJustaCausa['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosJustaCausa['lacre'].'</span></h5>';

                        $protocolo = getProtocolo($ultimosJustaCausa['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosJustaCausa['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosJustaCausa['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }

                        $ultimosJustaCausa['nombres'] = formatName($ultimosJustaCausa['nombres'], $ultimosJustaCausa['apellidos']);
                                              
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosJustaCausa['datecreated']; ?></td>
                          <td><?= $ultimosJustaCausa['protocolo']; ?></td>
                          <td><?= $ultimosJustaCausa['lacre']; ?></td>
                          <td><?= $ultimosJustaCausa['matricula']; ?></td>
                          <td><?= $ultimosJustaCausa['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosJustaCausa['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchJustaCausa()"><i class="fa fa-search" aria-hidden="true"></i> Justa Causa</button>
              </div>
            </div>

            <!-- div Rescisão -->
            <div class="tab-pane fade" id="pills-rescisão" role="tabpanel" aria-labelledby="rescisão-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosRescisão']) {
                      foreach ($data['ultimosRescisão'] as $ultimosRescisão)
                      {
                        $ultimosRescisão['datecreated'] = date("d-m-Y", strtotime($ultimosRescisão['datecreated']));

                        $ultimosRescisão['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosRescisão['lacre'].'</span></h6>';

                        $protocolo = getProtocolo($ultimosRescisão['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosRescisão['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosRescisão['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }

                        $ultimosRescisão['nombres'] = formatName($ultimosRescisão['nombres'], $ultimosRescisão['apellidos']);
                                              
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosRescisão['datecreated']; ?></td>
                          <td><?= $ultimosRescisão['protocolo']; ?></td>
                          <td><?= $ultimosRescisão['lacre']; ?></td>
                          <td><?= $ultimosRescisão['matricula']; ?></td>
                          <td><?= $ultimosRescisão['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosRescisão['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchRescisao()"><i class="fa fa-search" aria-hidden="true"></i> Rescisão</button>
              </div>
            </div>

            <!-- div INSS -->
            <div class="tab-pane fade" id="pills-inss" role="tabpanel" aria-labelledby="inss-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosINSS']) {
                      foreach ($data['ultimosINSS'] as $ultimosINSS)
                      {
                        $ultimosINSS['datecreated'] = date("d-m-Y", strtotime($ultimosINSS['datecreated']));

                        $ultimosINSS['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosINSS['lacre'].'</span></h6>';

                        $protocolo = getProtocolo($ultimosINSS['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosINSS['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosINSS['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }

                        $ultimosINSS['nombres'] = formatName($ultimosINSS['nombres'], $ultimosINSS['apellidos']);
                                              
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosINSS['datecreated']; ?></td>
                          <td><?= $ultimosINSS['protocolo']; ?></td>
                          <td><?= $ultimosINSS['lacre']; ?></td>
                          <td><?= $ultimosINSS['matricula']; ?></td>
                          <td><?= $ultimosINSS['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosRescisão['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchINSS()"><i class="fa fa-search" aria-hidden="true"></i> INSS</button>
              </div>
            </div>

            <!-- div Licença maternidade -->
            <div class="tab-pane fade" id="pills-maternidade" role="tabpanel" aria-labelledby="maternidade-tab">
              <div class="table-responsive">
                <table class="table table-striped mb-4">
                  <thead>
                    <tr class="text-center">
                      <th>CADASTRO</th>
                      <th>PROTOCOLO</th>
                      <th>EQUIPAMENTO</th>
                      <th>MATRÍCULA</th>
                      <th>USUARIO</th>
                      <th>AÇÕES</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    if($data['ultimosMaternidade']) {
                      foreach ($data['ultimosMaternidade'] as $ultimosMaternidade)
                      {
                        $ultimosMaternidade['datecreated'] = date("d-m-Y", strtotime($ultimosMaternidade['datecreated']));

                        $ultimosMaternidade['lacre'] = '<h6>Fone: <span class="badge badge-secondary">#'.$ultimosMaternidade['lacre'].'</span></h6>';

                        $protocolo = getProtocolo($ultimosMaternidade['equipamentoid'], 0);
                        
                        if($protocolo) {
                          $ultimosMaternidade['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                        } else {
                          $ultimosMaternidade['protocolo'] = '<span class="font-italic text-secondary">Nenhum</span>';
                        }

                        $ultimosMaternidade['nombres'] = formatName($ultimosMaternidade['nombres'], $ultimosMaternidade['apellidos']);
                                              
                    ?>
                        <tr class="text-center">
                          <td><?= $ultimosMaternidade['datecreated']; ?></td>
                          <td><?= $ultimosMaternidade['protocolo']; ?></td>
                          <td><?= $ultimosMaternidade['lacre']; ?></td>
                          <td><?= $ultimosMaternidade['matricula']; ?></td>
                          <td><?= $ultimosMaternidade['nombres']; ?></td>
                          <td>
                            <button class="btn btn-secondary btn-sm" onClick="fntViewInfo(<?= $ultimosRescisão['idcontrole']; ?>)" title="Ver Troca">
                              <i class="far fa-eye"></i>
                            </button>
                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                    ?>
                      <tr class="text-center font-italic"><td colspan="6" class="py-4"><h5>Nenhuma Informação</h5></td></tr>
                    <?php } ?>
                  </tbody>
                </table>
                <button class="btn btn-primary btn-sm mb-4" onclick="fntsearchMaternidade()"><i class="fa fa-search" aria-hidden="true"></i> Licença Maternidade</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Gráficas de Equipamentos -->
        <div class="tile py-3 m-0 mt-5">
          <h3 class="tile-title text-center mb-5">GRÁFICO DOS CONTROLES</h3>
          <ul class="nav nav-tabs mb-3" id="pills-tabGraficoControle" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-graficoEntregas-tab" data-toggle="pill" href="#pills-graficoEntregas" role="tab" aria-controls="pills-graficoEntregas" aria-selected="true">ENTREGAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoTrocas-tab" data-toggle="pill" href="#pills-graficoTrocas" role="tab" aria-controls="pills-graficoTrocas" aria-selected="false">TROCAS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoDesligamentos-tab" data-toggle="pill" href="#pills-graficoDesligamentos" role="tab" aria-controls="pills-graficoDesligamentos" aria-selected="false">DESLIGAMENTOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoPediuConta-tab" data-toggle="pill" href="#pills-graficoPediuConta" role="tab" aria-controls="pills-graficoPediuConta" aria-selected="false">PEDIU CONTA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoSemRenovacao-tab" data-toggle="pill" href="#pills-graficoSemRenovacao" role="tab" aria-controls="pills-graficoSemRenovacao" aria-selected="false">SEM RENOVAÇÃO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoJustaCausa-tab" data-toggle="pill" href="#pills-graficoJustaCausa" role="tab" aria-controls="pills-graficoJustaCausa" aria-selected="false">JUSTA CAUSA</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoRescisao-tab" data-toggle="pill" href="#pills-graficoRescisao" role="tab" aria-controls="pills-graficoRescisao" aria-selected="false">RESCISÃO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoINSS-tab" data-toggle="pill" href="#pills-graficoINSS" role="tab" aria-controls="pills-graficoINSS" aria-selected="false">INSS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-graficoMaternidade-tab" data-toggle="pill" href="#pills-graficoMaternidade" role="tab" aria-controls="pills-graficoMaternidade" aria-selected="false">MATERNIDADE</a>
            </li>
          </ul>

          <div class="tab-content" id="pills-tabGraficoContent">
            <!-- Gráfica Entregas -->
            <div class="tab-pane fade show active" id="pills-graficoEntregas" role="tabpanel" aria-labelledby="pills-graficoEntregas-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker entregasMes" name="entregasMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchEntregasMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesEntregas"></div>
              </div>
            </div>

            <!-- Gráfica Trocas -->
            <div class="tab-pane fade" id="pills-graficoTrocas" role="tabpanel" aria-labelledby="pills-graficoTrocas-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker trocasMes" name="trocasMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchTrocasMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesTrocas"></div>
              </div>
            </div>

            <!-- Gráfica Desligamentos -->
            <div class="tab-pane fade" id="pills-graficoDesligamentos" role="tabpanel" aria-labelledby="pills-graficoDesligamentos-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker desligamentosMes" name="desligamentosMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchDesligamentosMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesDesligamentos"></div>
              </div>
            </div>

            <!-- Gráfica Pediu Conta -->
            <div class="tab-pane fade" id="pills-graficoPediuConta" role="tabpanel" aria-labelledby="pills-graficoPediuConta-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker pediuContaMes" name="pediuContaMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchPediuContaMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesPediuConta"></div>
              </div>
            </div>

            <!-- Gráfica Sem Renovação -->
            <div class="tab-pane fade" id="pills-graficoSemRenovacao" role="tabpanel" aria-labelledby="pills-graficoSemRenovacao-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker semRenovacaoMes" name="semRenovacaoMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchSemRenovacaoMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesSemRenovacao"></div>
              </div>
            </div>

            <!-- Gráfica Justa Causa -->
            <div class="tab-pane fade" id="pills-graficoJustaCausa" role="tabpanel" aria-labelledby="pills-graficoJustaCausa-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker justaCausaMes" name="justaCausaMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchJustaCausaMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesJustaCausa"></div>
              </div>
            </div>

            <!-- Gráfica Recição -->
            <div class="tab-pane fade" id="pills-graficoRescisao" role="tabpanel" aria-labelledby="pills-graficoRescisao-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker rescisaoMes" name="rescisaoMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchRescisaoMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesRescisao"></div>
              </div>
            </div>

            <!-- Gráfica INSS -->
            <div class="tab-pane fade" id="pills-graficoINSS" role="tabpanel" aria-labelledby="pills-graficoINSS-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker INSSMes" name="INSSMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchINSSMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesINSS"></div>
              </div>
            </div>

            <!-- Gráfica Licença maternidade -->
            <div class="tab-pane fade" id="pills-graficoMaternidade" role="tabpanel" aria-labelledby="pills-graficoMaternidade-tab">
              <div class="tile">
                <div class="container-title">
                  <div class="dflex">
                    <input class="date-picker maternidadeMes" name="maternidadeMes" placeholder="Mês e Ano">
                    <button type="button" class="btn btn-info btn-sm"><i class="fas fa-search" onclick="fntSearchMaternidadeMes()" title="Procurar data"></i></button>
                  </div>
                </div>
                <div id="graficaMesMaternidade"></div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
<?php footerAdmin($data); ?>

<script>
  // Gráfica Entregas
  Highcharts.chart('graficaMesEntregas', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Entregas de <?= $data['entregasMDia']['mes'].' de '.$data['entregasMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['entregasMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['entregasMDia']['controles'] as $dia) {
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
            foreach ($data['entregasMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });

  // Gráfica Trocas
  Highcharts.chart('graficaMesTrocas', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Trocas de <?= $data['trocasMDia']['mes'].' de '.$data['trocasMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['trocasMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['trocasMDia']['controles'] as $dia) {
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
            foreach ($data['trocasMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });

  // Gráfica Desligamentos
  Highcharts.chart('graficaMesDesligamentos', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Desligamentos de <?= $data['desligamentosMDia']['mes'].' de '.$data['desligamentosMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['desligamentosMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['desligamentosMDia']['controles'] as $dia) {
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
            foreach ($data['desligamentosMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });

  // Gráfica Pediu Conta
  Highcharts.chart('graficaMesPediuConta', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Pediu Conta de <?= $data['pediuContaMDia']['mes'].' de '.$data['pediuContaMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['pediuContaMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['pediuContaMDia']['controles'] as $dia) {
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
            foreach ($data['pediuContaMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });

  // Gráfica Sem renovação
  Highcharts.chart('graficaMesSemRenovacao', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Sem Renovação de <?= $data['semRenovacaoMDia']['mes'].' de '.$data['semRenovacaoMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['semRenovacaoMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['semRenovacaoMDia']['controles'] as $dia) {
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
            foreach ($data['semRenovacaoMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });

  // Gráfica Justa Causa
  Highcharts.chart('graficaMesJustaCausa', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Justa Causa de <?= $data['justaCausaMDia']['mes'].' de '.$data['justaCausaMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['justaCausaMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['justaCausaMDia']['controles'] as $dia) {
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
            foreach ($data['justaCausaMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });

  // Gráfica Rescisão
  Highcharts.chart('graficaMesRescisao', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Rescisões de <?= $data['rescisaoMDia']['mes'].' de '.$data['rescisaoMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['rescisaoMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['rescisaoMDia']['controles'] as $dia) {
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
            foreach ($data['rescisaoMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });
  // Gráfica INSS
  Highcharts.chart('graficaMesINSS', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'INSS de <?= $data['INSSMDia']['mes'].' de '.$data['INSSMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['INSSMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['INSSMDia']['controles'] as $dia) {
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
            foreach ($data['INSSMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });
  // Gráfica Licança maternidade
  Highcharts.chart('graficaMesMaternidade', 
  {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Licença Maternidade de <?= $data['maternidadeMDia']['mes'].' de '.$data['maternidadeMDia']['anio']; ?>'
    },
    subtitle: {
        text: 'Total: <?= $data['maternidadeMDia']['total']; ?>'
    },
    xAxis: {
        categories: [
          <?php 
            foreach ($data['maternidadeMDia']['controles'] as $dia) {
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
            foreach ($data['maternidadeMDia']['controles'] as $controle) {
              echo $controle['controle'].",";
            }
          ?>
        ]
    }]
  });
</script>
    