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
            <!-- <button class="btn btn-primary" type="button" onclick="openModalEntregue();" ><i class="fas fa-arrow-left"></i>&nbsp; Receber</button> -->
            <!-- <div class="btn-group" role="group">
              <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Controle
              </button>
              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                <a class="dropdown-item" href="#" onclick="openModalEntregue();">Entregar <i class="fas fa-arrow-right"></i></a>
                <a class="dropdown-item" href="#"><i class="fas fa-arrow-left"></i> Receber</a>
              </div>
            </div> -->
            <?php } ?>
        </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb d-none d-lg-flex">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/entregue"><?= $data['page_title2'] ?></a></li>
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
                  <th>Matrícula</th>
                  <th>Nome</th>
                  <th>Equipamento</th>
                  <th>Protocolo</th>
                  <th>Data</th>
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
  