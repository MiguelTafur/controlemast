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

      <div class="row">
        <!-- MÁQUINAS -->
        <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
        <div class="col-md-6 col-lg-3 pr-lg-0">
          <a href="<?= base_url() ?>/maquinas" class="linkw">
            <div class="widget-small secundario coloured-icon"><i class="icon fa fa-windows fa-3x"></i>
              <div class="info">
                <h4>Entregas</h4>
                <p>Total: <span class="text-success font-italic">1</span></p>
              </div>
            </div>
          </a>
        </div>
        <?php } ?>

      </div>
    </main>
<?php footerAdmin($data); ?>
    