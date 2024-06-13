<!-- Modal agregar y editar usuario -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Novo Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formUsuario" name="formUsuario" class="form-horizontal">
          <input type="hidden" id="idUsuario" name="idUsuario" value="">
          <p class="font-italic">Os campos com asterisco (<span class="required">*</span>) são obrigatórios.</p>
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtMatricula">Matrícula <span class="required">*</span></label>
              <input type="text" class="form-control" id="txtMatricula" name="txtMatricula" required="">
            </div>  
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nome <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
            </div>  
            <div class="form-group col-md-6">
              <label for="txtApellido">Sobrenome <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtApellido" name="txtApellido" required="">
            </div>  
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtTelefono">Telefone</label>
              <input type="text" class="form-control valid validNumber" id="txtTelefono" name="txtTelefono" onkeypress="return controlTag(event)">
            </div>  
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" autocomplete="username">
            </div>
          </div>

          <div class="form-row justify-content-center">
            <div class="form-group col-md-6">
              <label for="listRolid">Tipo de usuário <span class="required">*</span></label>
              <select class="form-control" data-live-search="true" id="listRolid" name="listRolid" required></select>
            </div>  
            <div class="form-group col-md-6">
              <label for="listStatus">Estado <span class="required">*</span></label>
              <select class="form-control selectpicker" id="listStatus" name="listStatus" required>
                <option value="1">Ativo</option>
                <option value="2">Inativo</option>
              </select>
            </div> 
          </div>
          <div class="row">
            <div class="form-group col-md-6" id="divListRuta">
              <label for="listRuta">Empresa <span class="required">*</span></label>
              <select class="form-control" data-live-search="true" id="listRuta" name="listRuta" required></select>
            </div>
            <div class="form-group col-md-6" id="divListModelo">
              <label for="listModelo">Modelo <span class="required">*</span></label>
              <select class="form-control selectpicker" id="listModelo" name="listModelo" required>
                <option value="1">Precensial</option>
                <option value="2">Home Office</option>
              </select>
            </div>
          </div>
          <hr>
          <div class="tile-footer">
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Salvar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal ver usuario-->
<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Dados do Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>                                    
            <tr>
              <td>Nome:</td>
              <td id="celNombres"></td>
            </tr>
            <tr>
              <td>Sobrenome:</td>
              <td id="celApellidos"></td>
            </tr>
            <tr>
              <td>Matrícula:</td>
              <td id="celMatricula"></td>
            </tr>
            <tr>
              <td>Telefone:</td>
              <td id="celTelefono"></td>
            </tr>
            <tr>
              <td>Email (Usuário)</td>
              <td id="celEmail"></td>
            </tr>
            <tr>
              <td>Tipo de Usuário</td>
              <td id="celTipoUsuario"></td>
            </tr>
            <tr>
              <td>Modelo de Trabalho</td>
              <td id="celModelo"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
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



