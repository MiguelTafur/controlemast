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
              <label for="txtLacre">Lacre <span class="required">*</span></label>
              <input type="tel" class="form-control" id="txtLacre" name="txtLacre" onkeypress="return controlTag(event)" required>
            </div>
            <div class="form-group col-md-12">
              <label for="txtCodigo">Código / Serial:</label>
              <input type="text" class="form-control valid" id="txtCodigo" name="txtCodigo">
            </div>
            <div class="form-group col-md-12" id="divFileAnotacion">
              <label for="fileAnotacao">Imagen</label>
              <input type="file" class="form-control-file" id="fileAnotacao" name="fileAnotacao" accept="application/pdf, image/png, image/jpeg">
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
            <label for="equipamentoEstragado" class="form-check-label">Fone estragado</label>
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
          <caption class="mt-3 mb-0" id="cptUser">USUÁRIO</caption>
          <tbody>
            <tr>
              <td>Marca:</td>
              <td id="celMarca"></td>
            </tr>
            <tr>
              <td>Código / Serial:</td>
              <td id="celCodigo"></td>
            </tr>
            <tr>
              <td>Lacre:</td>
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
              <table class="table table-borderless" id="tblUser">
                <tr>
                  <th>Matrícula</th>
                  <td id="celMatricula">123</td>
                </tr>
                <tr>
                  <th>Nombres</th>
                  <td id="celNombres">qqq</td>
                </tr>
                <tr>
                  <th>Apellidos</th>
                  <td id="celApellidos">www</td>
                </tr>
              </table>
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

<!-- modal ver fone gráfica -->
<div class="modal fade" id="modalViewEquipamentoGrafica" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Fones Cadastrados: <span id="dateFoneGrafica" class="font-italic font-weight-normal"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>LACRE</th>
                <th>MARCA</th>
                <th>ESTADO</th>
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

<?php anotaciones($data); ?>
