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
          <input type="hidden" id="estadoEquipamentoAnotacao" name="estadoEquipamentoAnotacao" value="">
          <div class="form-row align-items-center">
            <div class="form-group col-md-12 mb-4">
              <label for="fileAnotacao">Imagen</label>
              <input type="file" class="form-control-file" id="fileAnotacao" name="fileAnotacao">
            </div>
            <div class="form-group col-md-12">
              <label for="txtAnotacao">Anotação <span class="required">*</span></label>
              <textarea class="form-control" id="txtAnotacao" name="txtAnotacao" required></textarea>
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
  <div class="modal-dialog modal-xl">
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
              <th>Usuario</th>
              <th>Data</th>
              <th>Estado Equipamento</th>
              <th>Anotação</th>
              <th>Imagem</th>
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
          <div class="form-row">
            <div class="col-sm-12 mb-3">
              <label for="txtAnotacaoEstado">Estado <span class="required">*</span></label>
              <select class="form-control" style="width: 100%;" id="listEstado" name="listEstado" required>
                <option value=""></option>
                <option value="1">Disponível</option>
                <option value="3">Estragado</option>
                <option value="4">Concerto</option>
              </select>
            </div>
            <div class="form-group col-md-12">
              <label for="txtAnotacaoEstado">Anotação <span class="required">*</span></label>
              <textarea class="form-control" id="txtAnotacaoEstado" name="txtAnotacaoEstado" required></textarea>
            </div>
            <div class="form-group col-md-12 mb-4">
              <label for="fileEstado">Imagen</label>
              <input type="file" class="form-control-file" id="fileEstado" name="fileEstado">
            </div>
            <div class="col-sm-3">
              <button type="submit" class="btn btn-primary my-1">Salvar</button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>