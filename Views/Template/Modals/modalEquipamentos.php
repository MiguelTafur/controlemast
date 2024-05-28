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
              <label for="txtNombre">Nombre <span class="required">*</span></label>
              <input type="tel" class="form-control" id="txtNombre" name="txtNombre" required="">
            </div>  
            <div class="form-group col-md-12">
              <label for="txtMarca">Marca <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtMarca" name="txtMarca" required="">
            </div>  
            <div class="form-group col-md-12">
              <label for="txtCodigo">Código <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtCodigo" name="txtCodigo">
            </div>  
            <div class="form-group col-md-12">
              <label for="txtLacre">Lacre</label>
              <input type="tel" class="form-control" id="txtLacre" name="txtLacre" onkeypress="return controlTag(event)">
            </div> 
            <div class="form-group col-md-12">
              <label for="txtEmail">Estado</label>
              <input type="text" class="form-control" id="txtEmail" name="txtEmail">
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