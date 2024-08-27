<!-- ******************  USUARIOS  **************** -->
<!-- Modal detalle Usuarios Activos -->
<div class="modal fade" id="modalDetalleU" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Usuarios Ativos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaUsuarios" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchUsuariosD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divUsuariosD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>MATRÍCULA</th>
                  <th>USUÁRIO</th>
                  <th>CARGO</th>
                  <th>MODELO</th>
                </tr>
              </thead>
              <tbody id="datosUsuariosD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal detalle Usuarios Inactivos -->
<div class="modal fade" id="modalDetalleUI" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Usuarios Inativos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaUsuariosI" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchUsuariosID()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divUsuariosID">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr class="text-center">
                  <th>ENTRADA</th>
                  <th>SALIDA</th>
                  <th>MATRÍCULA</th>
                  <th>USUÁRIO</th>
                  <th>CARGO</th>
                  <th>ESTADO</th>
                </tr>
              </thead>
              <tbody id="datosUsuariosID">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ******************  EQUIPAMENTOS  **************** -->
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
        <div class="table-responsive">
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Fechar
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal detalle Fones -->
<div class="modal fade" id="modalDetalleFones" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Fones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaFones" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchFonesD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divFonesD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
              <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>MARCA</th>
                  <th>CÓDIGO</th>
                  <th>LACRE</th>
                  <th>ESTADO</th>
                  <th>ANOTAÇÕES</th>
                </tr>
              </thead>
              <tbody id="datosFonesD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ******************  CONTROLE  **************** -->
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
            <tr>
              <td class="font-weight-bold">Evidência:</td>
              <td id="celEvidencia"></td>
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

<!-- modal detalles entregas -->
<div class="modal fade" id="modalDetalleEntregas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Entregas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaEntregas" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchEntregasD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divEntregasD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosEntregasD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles trocas -->
<div class="modal fade" id="modalDetalleTrocas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Trocas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaTrocas" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchTrocasD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divTrocasD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosTrocasD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles desligados -->
<div class="modal fade" id="modalDetalleDesligados" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Desligados</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaDesligados" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchDesligadosD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divDesligadosD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosDesligadosD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles pediu conta -->
<div class="modal fade" id="modalDetallePediuConta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Pediu Conta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaPediuConta" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchPediuContaD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divPediuContaD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosPediuContaD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles sem renovação -->
<div class="modal fade" id="modalDetalleSemRenovacao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Sem Renovação do Contrato</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaSemRenovacao" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchSemRenovacaoD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divSemRenovacaoD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosSemRenovacaoD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles Justa Causa -->
<div class="modal fade" id="modalDetalleJustaCausa" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Justa Causa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaJustaCausa" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchJustaCausaD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divJustaCausaD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosJustaCausaD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles Recisão -->
<div class="modal fade" id="modalDetalleRecisao" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Rescisão</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaRecisao" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchRecisaoD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divRecisaoD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosRecisaoD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles INSS -->
<div class="modal fade" id="modalDetalleINSS" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">INSS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaINSS" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchINSSD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divINSSD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosINSSD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- modal detalles Licença Maternidade -->
<div class="modal fade" id="modalDetalleMaternidade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal">Licença Maternidade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-10">
                <input type="text" readonly class="form-control" id="fechaMaternidade" placeholder="Selecione uma Data">
            </div>
            <div class="col-2">
              <button type="button" class="btn btn-warning mb-2" onclick="fntSearchMaternidadeD()"><i class="fas fa-search" aria-hidden="true"></i></button>
            </div>
          </div>
        </form>
        <div id="divMaternidadeD">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr class="text-center">
                  <th>CADASTRO</th>
                  <th>PROTOCOLO</th>
                  <th>EQUIPAMENTO</th>
                  <th>MATRÍCULA</th>
                  <th>USUARIO</th>
                </tr>
              </thead>
              <tbody id="datosMaternidadeD">

              </tbody>
            </table>
          </div>
          <br>
        </div>
      </div>
    </div>
  </div>
</div>