<?php 
  headerAdmin($data);
  getModal('modalReceber',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
        <i class="fa fa-sliders" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModalReceber();"><i class="fa fa-arrow-circle-o-down"></i>Receber</button>
            <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/receber"><?= $data['page_title2'] ?></a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-striped text-center" id="tableReceber">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Ação</th>
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
</main>
<?php footerAdmin($data); ?>
  