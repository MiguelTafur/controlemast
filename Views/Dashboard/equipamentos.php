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
          <!-- MÁQUINAS -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/maquinas" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-windows fa-3x"></i>
                <div class="info">
                  <h4>Máquinas</h4>
                  <p>Total: <span class="text-success font-italic"><?= $data['computadores']; ?></span></p>
                </div>
              </div>
            </a>
          </div>
          <?php } ?>

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

          <!-- TELAS -->
          <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
          <div class="col-md-6 col-lg-3 pr-lg-0">
            <a href="<?= base_url() ?>/telas" class="linkw">
              <div class="widget-small secundario coloured-icon"><i class="icon fa fa-television fa-3x"></i>
                <div class="info">
                  <h4>Telas</h4>
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
      </div>
      
    </main>
<?php footerAdmin($data); ?>
    