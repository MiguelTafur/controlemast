<?php 
  headerAdmin($data);
  getModal('modalFones',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
            <i class="fa fa-headphones" aria-hidden="true"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModal();" >
              <i class="fas fa-plus-circle"></i> 
              Adicionar
            </button>
            <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="mx-4">
        <h6 class="mb-0">
          DISPONÍVEIS: 
          <span class="text-success font-italic" id="cantFoneD"><?= $data['cantidadFonesD']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          EM USO: 
          <span class="text-info font-italic" id="cantFoneU"><?= $data['cantidadFonesU']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          ESTRAGADOS: 
          <span class="text-danger font-italic" id="cantFoneE"><?= $data['cantidadFonesE']; ?></span>
        </h6>
      </li>
      <li class="ml-3">
        <h6 class="mb-0">
          CONCERTO: 
          <span class="text-warning font-italic" id="cantFoneC"><?= $data['cantidadFonesC']; ?></span>
        </h6>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-striped text-center" id="tableEquipamentos">
              <thead>
                <tr>
                  <th>Marca</th>
                  <th>Código / Serial</th>
                  <th>Lacre</th>
                  <th>Estado</th>
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
  