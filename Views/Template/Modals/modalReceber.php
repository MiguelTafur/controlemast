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
                <option value="3">Estragado</option>
                <option value="4">Desligamento</option>
                <option value="5">Pediu Conta</option>
              </select>
            </div>
            <div class="form-group col-md-12 text-left">
              <label for="txtObservacion">Anotação <span class="required">*</span></label>
              <textarea class="form-control" id="txtObservacion" name="txtObservacion" required></textarea>
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