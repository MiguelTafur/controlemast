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

      <!-- total de entregas y trocas -->
      <div class="row">
        <!-- Entregas -->
        <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
        <div class="col-md-6 col-lg-3 pr-lg-0">
          <a href="<?= base_url() ?>/entregues" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-long-arrow-right fa-3x"></i>
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
          <a href="<?= base_url() ?>/recebidos" class="linkw">
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
          <a href="<?= base_url() ?>/recebidos" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
              <div class="info">
                <h4>Desligados</h4>
                <p>Total: <span class="text-success font-italic"><?= $data['desligados']; ?></span></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>

        <!-- Pediu conta -->
        <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
        <div class="col-md-6 col-lg-3 pr-lg-0">
          <a href="<?= base_url() ?>/recebidos" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-user-times fa-3x"></i>
              <div class="info">
                <h4>Pediu conta</h4>
                <p>Total: <span class="text-success font-italic"><?= $data['pediuConta']; ?></span></p>
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
                  </tr>
                </thead>
                <tbody>
                <?php
                  if($data['ultimasEntregas']) {
                    foreach ($data['ultimasEntregas'] as $ultimasEntregas)
                    {
                      $ultimasEntregas['datecreated'] = date("d-m-Y", strtotime($ultimasEntregas['datecreated']));

                      $ultimasEntregas['lacre'] = '<h5>Fone: <span class="badge badge-secondary">#'.$ultimasEntregas['lacre'].'</span></h5>';

                      $ultimasEntregas['protocolo'] = '<a 
                                                          href="'.base_url().'/Assets/images/imagenes/'.$ultimasEntregas['protocolo'].'" 
                                                          target="_blank" 
                                                          class="text-dark" 
                                                          style="margin: 0;">
                                                          <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                          </i>
                                                        </a>';
                      $ultimo = explode(" ", $ultimasEntregas['apellidos']);
                      $ultimasEntregas['nombres'] = strtoupper(strtok($ultimasEntregas['nombres'], " "). ' ' . array_reverse($ultimo)[0]);
                                            
                  ?>
                      <tr class="text-center">
                        <td><?= $ultimasEntregas['datecreated']; ?></td>
                        <td><?= $ultimasEntregas['protocolo']; ?></td>
                        <td><?= $ultimasEntregas['lacre']; ?></td>
                        <td><?= $ultimasEntregas['matricula']; ?></td>
                        <td><?= $ultimasEntregas['nombres']; ?></td>
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
                  </tr>
                </thead>
                <tbody>
                <?php
                  if($data['ultimasTrocas']) {
                    foreach ($data['ultimasTrocas'] as $ultimasTrocas)
                    {
                      $ultimasTrocas['datecreated'] = date("d-m-Y", strtotime($ultimasTrocas['datecreated']));

                      $ultimasTrocas['lacre'] = '<h5>Fone: <span class="badge badge-secondary">#'.$ultimasTrocas['lacre'].'</span></h5>';

                      $protocolo = getProtocolo($ultimasTrocas['equipamentoid']);
                      $ultimasTrocas['protocolo'] = '<a 
                                                        href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                        target="_blank" 
                                                        class="text-dark" 
                                                        style="margin: 0;">
                                                        <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                        </i>
                                                      </a>';
                      $ultimo = explode(" ", $ultimasTrocas['apellidos']);
                      $ultimasTrocas['nombres'] = strtoupper(strtok($ultimasTrocas['nombres'], " "). ' ' . array_reverse($ultimo)[0]);
                                            
                  ?>
                      <tr class="text-center">
                        <td><?= $ultimasTrocas['datecreated']; ?></td>
                        <td><?= $ultimasTrocas['protocolo']; ?></td>
                        <td><?= $ultimasTrocas['lacre']; ?></td>
                        <td><?= $ultimasTrocas['matricula']; ?></td>
                        <td><?= $ultimasTrocas['nombres']; ?></td>
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
                  </tr>
                </thead>
                <tbody>
                <?php
                  if($data['ultimosDesligamentos']) {
                    foreach ($data['ultimosDesligamentos'] as $ultimosDesligamentos)
                    {
                      $ultimosDesligamentos['datecreated'] = date("d-m-Y", strtotime($ultimosDesligamentos['datecreated']));

                      $ultimosDesligamentos['lacre'] = '<h5>Fone: <span class="badge badge-secondary">#'.$ultimosDesligamentos['lacre'].'</span></h5>';

                      $protocolo = getProtocolo($ultimosDesligamentos['equipamentoid']);
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
                        $ultimosDesligamentos['protocolo'] = '<a 
                                                        href="#" 
                                                        class="text-dark disabled" 
                                                        style="margin: 0;">
                                                        <span class="fa-stack fa-lg">
                                                          <i class="fa fa-file-text-o fa-stack-1x" aria-hidden="true"></i>
                                                          <i class="fa fa-ban fa-stack-2x text-danger"></i>
                                                        </span>
                                                      </a>';
                      }
                      $ultimo = explode(" ", $ultimosDesligamentos['apellidos']);
                      $ultimosDesligamentos['nombres'] = strtoupper(strtok($ultimosDesligamentos['nombres'], " "). ' ' . array_reverse($ultimo)[0]);
                                            
                  ?>
                      <tr class="text-center">
                        <td><?= $ultimosDesligamentos['datecreated']; ?></td>
                        <td><?= $ultimosDesligamentos['protocolo']; ?></td>
                        <td><?= $ultimosDesligamentos['lacre']; ?></td>
                        <td><?= $ultimosDesligamentos['matricula']; ?></td>
                        <td><?= $ultimosDesligamentos['nombres']; ?></td>
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
                  </tr>
                </thead>
                <tbody>
                <?php
                  if($data['ultimosPediuConta']) {
                    foreach ($data['ultimosPediuConta'] as $ultimosPediuConta)
                    {
                      $ultimosPediuConta['datecreated'] = date("d-m-Y", strtotime($ultimosPediuConta['datecreated']));

                      $ultimosPediuConta['lacre'] = '<h5>Fone: <span class="badge badge-secondary">#'.$ultimosPediuConta['lacre'].'</span></h5>';

                      $protocolo = getProtocolo($ultimosPediuConta['equipamentoid']);
                      $ultimosPediuConta['protocolo'] = '<a 
                                                        href="'.base_url().'/Assets/images/imagenes/'.$protocolo.'" 
                                                        target="_blank" 
                                                        class="text-dark" 
                                                        style="margin: 0;">
                                                        <i class="fa fa-file-text-o fa-lg" aria-hidden="true">
                                                        </i>
                                                      </a>';
                      $ultimo = explode(" ", $ultimosPediuConta['apellidos']);
                      $ultimosPediuConta['nombres'] = strtoupper(strtok($ultimosPediuConta['nombres'], " "). ' ' . array_reverse($ultimo)[0]);
                                            
                  ?>
                      <tr class="text-center">
                        <td><?= $ultimosPediuConta['datecreated']; ?></td>
                        <td><?= $ultimosPediuConta['protocolo']; ?></td>
                        <td><?= $ultimosPediuConta['lacre']; ?></td>
                        <td><?= $ultimosPediuConta['matricula']; ?></td>
                        <td><?= $ultimosPediuConta['nombres']; ?></td>
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

          <!-- div sem renovação -->
          <div class="tab-pane fade" id="pills-semRenovacao" role="tabpanel" aria-labelledby="semRenovacao-tab">
            Sem renovação
          </div>

          <!-- div Justa causa renovação -->
          <div class="tab-pane fade" id="pills-justaCausa" role="tabpanel" aria-labelledby="justaCausa-tab">
            Justa causa
          </div>

          <!-- div Rescisão -->
          <div class="tab-pane fade" id="pills-rescisão" role="tabpanel" aria-labelledby="rescisão-tab">
            Rescisão
          </div>
        </div>
      </div>
    </main>
<?php footerAdmin($data); ?>
    