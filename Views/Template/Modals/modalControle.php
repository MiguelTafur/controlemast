<!-- modal formulario Controles -->
<div class="modal fade" id="modalFormControles" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Controle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formControles" name="formControles" class="form-horizontal">
          <input type="hidden" id="idControle" name="idControle" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
            <div class="form-group col-md-12" id="divListRuta">
              <label for="listUsuario">Usuario <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listUsuario" name="listUsuario" required></select>
            </div> 
            <div class="form-group col-md-12">
              <label for="listEquipamento">Equipamento <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listEquipamento" name="listEquipamento" required></select>
            </div> 
            <div class="form-group col-md-12">
              <label for="listEstadoEquipamento">Estado Equipamento <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listEstadoEquipamento" name="listEstadoEquipamento" required>
                <option value="">-- Escolher --</option>
                <option value="1">Entregue</option>
                <option value="2">Recebido</option>                
                <option value="3">Troca</option>
                <option value="4">Estragado</option>
                <option value="5">Concerto</option>                
              </select>
            </div>
            <div class="form-group col-md-12 text-left">
              <label for="fileProtocolo">Protocolo</label>
              <input type="text" class="form-control" id="fileProtocolo" name="fileProtocolo">
            </div>
            <div class="form-group col-md-12 text-left">
              <label for="txtObservacion">Observação</label>
              <textarea class="form-control" id="txtObservacion" name="txtObservacion"></textarea>
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