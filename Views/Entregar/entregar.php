<?php 
  headerAdmin($data);
  getModal('modalControle',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
        <i class="fa fa-sliders" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModalEntregue();" >Entregar <i class="fa fa-arrow-circle-o-up"></i></button>
            <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb d-none d-lg-block text-right">
      <li class="mx-4">
        <h6 class="mb-2">
          TOTAL: 
          <span class="text-success font-italic" id="cantEntregas">&nbsp;<?= $data['cantidadEntregas']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          HOJE: 
          <span class="text-success font-italic" id="cantEntregasHoy">&nbsp;<?= $data['cantidadEntregasHoy']; ?></span>
        </h6>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-striped text-center" id="tableEntregue">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Protocolo</th>
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
  