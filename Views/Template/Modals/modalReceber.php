<!-- modal formulario Controles Receber -->
<div class="modal fade" id="modalFormControleReceber" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Controle de Recebimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formControleReceber" name="formControleReceber" class="form-horizontal">
          <input type="hidden" id="idControleReceber" name="idControleReceber" value="">
          <input type="hidden" id="idequipamentoReceber" name="idequipamentoReceber" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="listUsuario">Usuário <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listUsuario" name="listUsuario" required></select>
            </div> 
            <div class="form-group col-md-12">
              <label for="txtEquipamento">Equipamento <span class="required">*</span></label>
              <input type="text" class="form-control" id="txtEquipamento" name="txtEquipamento" required disabled>
            </div> 
            <div class="form-group col-md-12">
              <label for="listAcao">Ação <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listAcao" name="listAcao" required>
                <option value=""></option>
                <option value="2">Troca</option>
                <option value="3">Desligamento</option>
                <option value="4">Pediu Conta</option>
              </select>
            </div>
            <div class="form-group col-md-12 mb-4">
              <label for="fileReceber">Imagen</label>
              <input type="file" class="form-control-file" id="fileReceber" name="fileReceber">
            </div>
            <div class="form-group col-md-12">
              <label for="txtObservacion">Anotação <span class="required">*</span></label>
              <textarea class="form-control" id="txtObservacion" name="txtObservacion" required></textarea>
            </div>
          </div>
          <div class="form-check col-md-12">
            <input type="checkbox" class="form-check-input" name="equipamentoEstragado" id="equipamentoEstragado">
            <label for="equipamentoEstragado" class="form-check-label">Equipamento estragado</label>
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

<!-- modal ver Controles Receber -->
<div class="modal fade" id="modalViewControleReceber" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dados do Recebimento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td class="font-weight-bold">Data Registro:</td>
              <td id="celFechaRegistro"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Tipo de Ação:</td>
              <td id="celAcao"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Marca Equipamento:</td>
              <td id="celMarca"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Matrícula:</td>
              <td id="celMatricula"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Nomes Operador:</td>
              <td id="celNombres"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Sobrenomes Operador:</td>
              <td id="celApellidos"></td>
            </tr>
            <tr>
            <td class="font-weight-bold">Lacre Equipamento:</td>
              <td id="celLacre"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Anotações:</td>
              <td id="celObservacion"></td>
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