<!-- Modal agregar Ruta -->
<div class="modal fade" id="modalFormRutas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nova Emrpesa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formRuta" name="formRuta" class="form-horizontal">
            <input type="hidden" id="idRuta" name="idRuta" value="">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtNombre">Nome</label>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
            </div>
            <div class="form-group col-md-12" id="divCodigo">
              <label for="codigoRuta">Código</label>
              <input type="text" class="form-control" id="codigoRuta" name="codigoRuta" required="">
            </div>  
          </div>
          <hr>
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>