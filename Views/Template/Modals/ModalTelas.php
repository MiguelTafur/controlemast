<!-- modal formulario Tela -->
<div class="modal fade" id="modalFormTelas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nova Tela</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTelas" name="formTelas" class="form-horizontal">
          <input type="hidden" id="idEquipamento" name="idEquipamento" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
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
            <div class="form-group col-md-12" id="divFileAnotacion">
              <label for="fileAnotacao">Imagen</label>
              <input type="file" class="form-control-file" id="fileAnotacao" name="fileAnotacao">
            </div>  
            <div class="form-group col-md-12" id="divTxtAnotacion">
              <label for="txtObservacion">Anotação</label>
              <textarea class="form-control" id="txtObservacion" name="txtObservacion"></textarea>
            </div>
            <div class="form-group col-md-12 text-center mt-3" id="divEditarEstado">
              <button class="btn btn-warning" type="button" onclick="openModalEditStatus();">Editar Estado &nbsp;<i class="fas fa-pencil-alt" aria-hidden="true"></i></button>
            </div>
          </div>
          <div class="form-check col-md-12" id="divEqEstragado">
            <input type="checkbox" class="form-check-input" name="equipamentoEstragado" id="equipamentoEstragado">
            <label for="equipamentoEstragado" class="form-check-label">Tela estragada</label>
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

<!-- modal ver Tela -->
<div class="modal fade" id="modalViewTela" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dados da Tela</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
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
            <tr>
              <td colspan="2"><button class="btn btn-info btn-block btnAnnotation" onclick="fntViewAnnotation();" >Ver Anotações &nbsp;<i class="fa fa-file-text-o" aria-hidden="true"></i></button></td>
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

<!-- modal editar Estado -->
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
          <p class="font-weight-bold m-0 ">Estado atual:  <span class="font-italic" id="estadoActual"></span></p>
        </div>
        <hr>
        <div id="noAlterado" class="d-none"></div>
        <form class="mt-3" id="formEditarEstado" name="formEditarEstado">
          <input type="hidden" id="idEquipamentoEstado" name="idEquipamentoEstado" value="">
          <div class="form-row">
            <div class="col-sm-12 mb-3">
              <label for="txtAnotacaoEstado">Estado <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listEstado" name="listEstado" required>
                <option value=""></option>
                <option value="1">Disponível</option>
                <option value="3">Estragado</option>
                <option value="4">Concerto</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="txtAnotacaoEstado">Anotação <span class="required">*</span></label>
              <textarea class="form-control" id="txtAnotacaoEstado" name="txtAnotacaoEstado" required></textarea>
            </div>
            <div class="form-group col-md-12 mb-4">
              <label for="fileEstado">Imagen</label>
              <input type="file" class="form-control-file" id="fileEstado" name="fileEstado">
            </div>
            <div class="col-sm-3">
              <button type="submit" class="btn btn-primary my-1">Salvar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<?php anotaciones($data); ?>