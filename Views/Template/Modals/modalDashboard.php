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

