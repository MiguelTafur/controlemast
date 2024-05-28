<!-- modal formulario equipamentos -->
<div class="modal fade" id="modalFormEquipamentos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Operador</h5>
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
              <label for="txtID">ID de Hardware <span class="required">*</span></label>
              <input type="text" class="form-control" id="txtID" name="txtID" required="">
            </div>
            <div class="form-group col-md-12">
              <label for="txtNombre">Nome <span class="required">*</span></label>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
            </div>
            <div class="form-group col-md-12">
              <label for="txtMarca">Marca <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtMarca" name="txtMarca" required="">
            </div>
            <div class="form-group col-md-12">
              <label for="txtCodigo">Código Equipamento</label>
              <input type="text" class="form-control valid" id="txtCodigo" name="txtCodigo">
            </div>
            <div class="form-group col-md-12">
              <label for="txtLacre">Código Lacre</label>
              <input type="tel" class="form-control" id="txtLacre" name="txtLacre" onkeypress="return controlTag(event)">
            </div>
            <!-- <div class="form-group col-md-12">
              <label for="sltEstado">Estado</label>
              <select class="form-group col-md-12" id="sltEstado" name="sltEstado">
                <option value="">-- Escolher --</option>
              </select>
            </div>  -->
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
              <td>ID de Hardware:</td>
              <td id="celID"></td>
            </tr>
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
          Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
