<!-- modal formulario Fone -->
<div class="modal fade" id="modalFormEquipamentos" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Fone</h5>
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
            <div class="form-group col-md-12 text-center mt-3" id="divAdicionarAnotacao">
              <button class="btn btn-secondary" type="button" onclick="openModalAddAnnotation();">Adicionar Anotação &nbsp;<i class="fa fa-file-text-o" aria-hidden="true"></i></button>
            </div>
            <div class="form-group col-md-12 text-center mt-3" id="divEditarEstado">
              <button class="btn btn-warning" type="button" onclick="openModalEditStatus();">Editar Estado &nbsp;<i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
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

<!-- modal ver Fone -->
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
            <tr></tr>
            <td colspan="2"><button class="btn btn-info btn-block btnAnnotation" onclick="fntViewAnnotation();" >Ver Anotações &nbsp;<i class="fa fa-file-text-o" aria-hidden="true"></i></button></td>
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
          <div class="form-row align-items-center">
            <div class="col-sm-9">
              <select class="form-control my-1 mr-sm-2" style="width: 100%;" id="listEstado" name="listEstado" required>
                <option value=""></option>
                <option value="1">Disponível</option>
                <option value="3">Estragado</option>
                <option value="4">Concerto</option>
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

<!-- modal Adicionar Anotación -->
<div class="modal fade" id="modalAddAnnotation" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Adicionar Anotação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p class="font-weight-bold font-italic m-0" id="equipamentoLacre"></p>
        </div>
        <hr>
        <form class="mt-3" id="formAnotacao" name="formAnotacao">
          <input type="hidden" id="idEquipamentoAnotacao" name="idEquipamentoAnotacao" value="">
          <div class="form-row align-items-center">
            <div class="form-group col-md-12">
              <label for="txtAnotacao">Anotação <span class="required">*</span></label>
              <textarea class="form-control" id="txtAnotacao" name="txtAnotacao" required></textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="fileAnotacao">Imagen</label>
              <input type="file" class="form-control-file" id="fileAnotacao" name="fileAnotacao">
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-primary my-1">Salvar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- modal ver Anotaciones -->
<div class="modal fade" id="modalViewAnnotation" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
        <table class="table table-striped text-center">
          <thead>
            <tr>
              <th>Data</th>
              <th>Anotação</th>
              <th>Arquivo</th>
            </tr>
          </thead>
          <tbody id="listAnotaciones"></tbody>
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
