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
      
      <div class="row">
        <!-- OPERADORES -->
        <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
        <div class="col-md-6 col-lg-3">
          <a href="<?= base_url() ?>/operacao" class="linkw">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Operadores</h4>
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

        <!-- COORDINADORES -->
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
          <div class="col-md-6 col-lg-3">
            <a href="<?= base_url() ?>/coordinadores" class="linkw">
              <div class="widget-small info coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                  <h4>Coordinadores</h4>
                  <p>
                  <p>Ativos: <span class="text-success font-italic"><?= $data['coordinadores']; ?></span></p>
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
      
    </main>
<?php footerAdmin($data); ?>
    