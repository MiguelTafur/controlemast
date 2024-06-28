<!-- ******************USUARIOS**************** -->
<!-- Modal detalle Usuarios Activos -->
<div class="modal fade" id="modalDetalleU" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Usuarios Ativos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaUsuarios" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchUsuariosD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divUsuariosD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>MATRÍCULA</th>
                  <th>USUÁRIO</th>
                  <th>CARGO</th>
                  <th>MODELO</th>
                </tr>
              </thead>
              <tbody id="datosUsuariosD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal detalle Usuarios Inactivos -->
<div class="modal fade" id="modalDetalleUI" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Usuarios Inativos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaUsuariosI" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchUsuariosID()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divUsuariosID">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>MATRÍCULA</th>
                  <th>USUÁRIO</th>
                  <th>CARGO</th>
                  <th>MODELO</th>
                </tr>
              </thead>
              <tbody id="datosUsuariosID">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ******************EQUIPAMENTOS**************** -->
<!-- modal ver Anotaciones -->
<div class="modal fade" id="modalViewAnnotation" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Anotações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="text-center" id="foneAnotacion"></h5>
        <br>
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>Usuario</th>
                <th>Data</th>
                <th>Estado Equipamento</th>
                <th>Anotação</th>
                <th>Imagem</th>
              </tr>
            </thead>
            <tbody id="listAnotaciones"></tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal detalle Fones -->
<div class="modal fade" id="modalDetalleFones" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Fones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaFones" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchFonesD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divFonesD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>MARCA</th>
                  <th>CÓDIGO</th>
                  <th>LACRE</th>
                  <th>ESTADO</th>
                  <th>ANOTAÇÕES</th>
                </tr>
              </thead>
              <tbody id="datosFonesD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>
