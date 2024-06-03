<!-- modal formulario equipamentos -->
<div class="modal fade" id="modalFormEquipamentos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Equipamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEquipamentos" name="formEquipamentos" class="form-horizontal">
          <input type="hidden" id="idEquipamento" name="idEquipamento" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtNombre">Nome <span class="required">*</span></label>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
            </div>
            <div class="form-group col-md-12">
              <label for="txtMarca">Marca <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtMarca" name="txtMarca" required="">
            </div>
            <div class="form-group col-md-12">
              <label for="txtLacre">Código Lacre</label>
              <input type="tel" class="form-control" id="txtLacre" name="txtLacre" onkeypress="return controlTag(event)" required>
            </div>
            <div class="form-group col-md-12">
              <label for="txtCodigo">Código Equipamento</label>
              <input type="text" class="form-control valid" id="txtCodigo" name="txtCodigo">
            </div>
            <div class="form-group col-md-12">
              <label for="txtObservacion">Anotação</label>
              <textarea class="form-control" id="txtObservacion" name="txtObservacion"></textarea>
            </div>
            <div class="form-group col-md-12 text-center mt-3" id="divEditarEstado">
              <button class="btn btn-warning" type="button" onclick="openModalEditStatus();">Editar Estado <i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
            </div>
          </div>
          <hr>
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Salvar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Fechar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- modal ver equipamento -->
<div class="modal fade" id="modalViewEquipamento" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dados do Equipamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nome:</td>
              <td id="celNombre"></td>
            </tr>
            <tr>
              <td>Marca:</td>
              <td id="celMarca"></td>
            </tr>
            <tr>
              <td>Código Equipamento:</td>
              <td id="celCodigo"></td>
            </tr>
            <tr>
              <td>Código Lacre:</td>
              <td id="celLacre"></td>
            </tr>
            <tr>
              <td>Data Registro:</td>
              <td id="celFechaRegistro"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- modal ver equipamento -->
<div class="modal fade" id="modalEditStatus" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Alterar Tipo de Estado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p class="font-weight-bold text-uppercase m-0 ">Tipo de Estado atual: <span class="font-italic" id="estadoActual"></span></p>
        </div>
        <hr>
        <form class="mt-3" id="formEditarEstado" name="formEditarEstado">
          <input type="hidden" id="idEquipamentoEstado" name="idEquipamentoEstado" value="">
          <div class="form-row align-items-center">
            <div class="col-sm-9">
              <select class="form-control my-1 mr-sm-2" style="width: 100%;" id="listEstado" name="listEstado" required>
              <option value=""></option>
              <option value="1">Disponível</option>
              <option value="3">Estragado</option>
              <option value="4">Concertando...</option>
            </select>
            </div>
            <div class="col-sm-3 text-center">
              <button type="submit" class="btn btn-primary my-1">Salvar</button>
            </div>
          </div>

          
        </form>
      </div>
      <div class="modal-footer justify-content-start">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>
