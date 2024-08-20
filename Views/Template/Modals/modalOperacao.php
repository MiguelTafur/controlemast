<!-- Modal agregar y editar Operacão -->
<div class="modal fade" id="modalFormOperacao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Operador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formOperacao" name="formOperacao" class="form-horizontal">
          <input type="hidden" id="idOperador" name="idOperador" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtMatricula">Matrícula <span class="required">*</span></label>
              <input type="tel" class="form-control" id="txtMatricula" name="txtMatricula" required="">
            </div>  
            <div class="form-group col-md-12">
              <label for="txtNombre">Nome <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
            </div>  
            <div class="form-group col-md-12">
              <label for="txtSobrenome">Sobrenome <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtSobrenome" name="txtSobrenome" required="">
            </div>  
            <div class="form-group col-md-12">
              <label for="txtTelefono">Telefone</label>
              <input type="tel" class="form-control" id="txtTelefono" name="txtTelefono" onkeypress="return controlTag(event)">
            </div> 
            <div class="form-group col-md-12">
              <label for="txtEmail">Email</label>
              <input type="text" class="form-control" id="txtEmail" name="txtEmail">
            </div> 
            <div class="form-group col-md-12">
              <label for="listModelo">Modelo <span class="required">*</span></label>
              <select class="form-control selectpicker" id="listModelo" name="listModelo" required>
                <option value="1">Presencial</option>
                <option value="2">Home Office</option>
              </select>
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

<!-- Modal ver operador-->
<div class="modal fade" id="modalViewOperador" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dados do Operador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Matrícula:</td>
              <td id="celMatricula" class="font-weight-bold font-italic"></td>
            </tr>
            <tr>
              <td>Nome:</td>
              <td id="celNombres"></td>
            </tr>
            <tr>
              <td>Sobrenome:</td>
              <td id="celApellidos"></td>
            </tr>
            <tr>
              <td>Telefone:</td>
              <td id="celTelefono"></td>
            </tr>
            <tr>
              <td>Email:</td>
              <td id="celEmail"></td>
            </tr>
            <tr>
              <td>Modelo de Trabalho</td>
              <td id="celModelo"></td>
            </tr>
            <tr>
              <td>Data Registro:</td>
              <td id="celFechaRegistro"></td>
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

<!-- modal ver operador gráfica -->
<div class="modal fade" id="modalViewPersonaGrafica" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Operadores Cadastrados: <span id="datePersonaGrafica" class="font-italic font-weight-normal"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">  
        <div class="table-responsive">
          <table class="table table-striped text-center">
            <thead>
              <tr>
                <th>Matrícula</th>
                <th>Nome</th>
                <th>Modelo</th>
              </tr>
            </thead>
            <tbody id="listgraficaPersona">
              
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