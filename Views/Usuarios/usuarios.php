<?php 
  headerAdmin($data);
  getModal('modalUsuarios',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1><i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Adicionar</button>
            <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/usuarios"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">
            <div class="table-responsive">
              <table class="table table-hover table-bordered" id="tableUsuarios">
                <thead>
                  <tr class="text-center">
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th>Modelo</th>
                    <th>Empresa</th>
                    <th>Estado</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</main>
<?php footerAdmin($data); ?>
  