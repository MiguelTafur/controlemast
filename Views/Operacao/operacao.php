<?php 
  headerAdmin($data);
  getModal('modalOperacao',$data); 
?>
<main class="app-content">
  <div class="app-title">
    <div>
        <h1>
          <i class="fas fa-user-tag"></i> <?= $data['page_title'] ?>
            <?php if($_SESSION['permisosMod']['w']){ ?>
            <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Adicionar</button>
            <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="mx-4">
        <h6 class="mb-0">
          PRESENCIAL:  
          <span class="text-success font-italic" id="cantOperadoresP">&nbsp;<?= $data['cantidadOperadoresP']; ?></span>
        </h6>
      </li>
      <li class="mx-4">
        <h6 class="mb-0">
          HOME OFFICE:  
          <span class="text-success font-italic" id="cantOperadoresH">&nbsp;<?= $data['cantidadOperadoresH']; ?></span>
        </h6>
      </li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-striped text-center" id="tableOperadores">
              <thead>
                <tr>
                  <th>Matrícula</th>
                  <th>Nome</th>
                  <th>Sobrenome</th>
                  <th>Modelo</th>
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
  