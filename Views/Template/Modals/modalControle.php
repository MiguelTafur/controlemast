<!-- modal formulario Controles Entregue -->
<div class="modal fade" id="modalFormControleEntrega" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Controle de Entrega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formControleEntrega" name="formControleEntrega" class="form-horizontal" enctype="multipart/form-data">
          <input type="hidden" id="idControleEntregue" name="idControleEntregue" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
            <div class="form-group col-md-12 p-1">
              <label for="listUsuario">Usuário <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listUsuario" name="listUsuario" required></select>
            </div> 
            <div class="form-group col-md-12">
              <label for="listEquipamento">Equipamento <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listEquipamento" name="listEquipamento" required></select>
            </div> 
            <div class="form-group">
              <label for="fileProtocolo">Protocolo <span class="required">*</span></label>
              <input type="file" class="form-control-file" id="fileProtocolo" name="fileProtocolo" accept="application/pdf, image/png, image/jpeg">
            </div>
            <div class="form-group col-md-12">
              <label for="txtObservacion">Anotação</label>
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

<!-- modal ver Controles Entregue -->
<div class="modal fade" id="modalViewControleEntrega" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dados da Entrega</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td class="font-weight-bold">Matrícula:</td>
              <td id="celMatricula"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Nomes:</td>
              <td id="celNombres"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Sobrenomes:</td>
              <td id="celApellidos"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Modelo de Trabalho:</td>
              <td id="celModelo"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Nome Equipamento:</td>
              <td id="celEquipamento"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Marca Equipamento:</td>
              <td id="celMarca"></td>
            </tr>
            <tr>
            <td class="font-weight-bold">Lacre Equipamento:</td>
              <td id="celLacre"></td>
            </tr>
            <tr>
              <td class="font-weight-bold">Data Registro:</td>
              <td id="celFechaRegistro"></td>
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

<!-- modal editar Protocolo -->
<div class="modal fade" id="modalEditProtocolo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Alterar Protocolo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-right mb-3">
          <a class="font-weight-bold text-decoration-underline" id="protocoloActual"><u>Protocolo atual</u></a>
        </div>
        <form class="mt-2" id="formEditarProtocolo" name="formEditarProtocolo">
          <input type="hidden" id="idControle" name="idControle" value="">
          <input type="hidden" id="imagenBD" name="imagenBD" value="">
          <div class="form-row text-center justify-content-center">
            <div class="form-group col-9">
              <label for="fileEditProtocolo" class="font-weight-bold">Novo Protocolo <span class="required">*</span></label>
              <input type="file" class="form-control-file" id="fileEditProtocolo" name="fileEditProtocolo" accept="image/jpeg, image/png" required>
            </div>
            <div class="col-5">
              <button type="submit" class="btn btn-block btn-primary my-1">Salvar</button>
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

<!-- modal ver equipamento gráfica -->
<div class="modal fade" id="modalViewEquipamentoGrafica" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Entregas: <span id="dateFoneGrafica" class="font-italic font-weight-normal"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>ESTADO</th>
                <th>MATRÍCULA</th>
                <th>NOME</th>
                <th>LACRE</th>
                <th>PROTOCOLO</th>
              </tr>
            </thead>
            <tbody id="listgraficaEquipamentos">
              
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>