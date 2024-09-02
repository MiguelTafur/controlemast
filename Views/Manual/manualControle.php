<?php headerAdmin($data); getModal('modalManual',$data);?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>
                    <i class="fa fa-users" aria-hidden="true"></i> <?= $data['page_title'] ?>
                </h1>
            </div>
        </div>

        <div class="container-fluid">
            <div class="tile">
                <h3 class="tile-title text-center">CONTROLE DE ENTREGA</h3>
                <div class="tile-body">
                    <div class="accordion" id="accordionControleEntrega">
                        <div class="card">
                            <div class="card-header" id="headingCriar">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: -3px;"></i>ENTREGAR EQUIPAMENTO
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingCriar" data-parent="#accordionControleEntrega">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/adicionarentrega.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingAlterar">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-pencil-alt" aria-hidden="true" style="margin-top: -3px;"></i>ALTERAR PROTOCOLO DE ENTREGA
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingAlterar" data-parent="#accordionControleEntrega">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/alterarprotocolo.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingGrafico">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fa fa-bar-chart" aria-hidden="true" style="margin-top: -3px;" ></i>GRÁFICO DAS ENTREGAS
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingGrafico" data-parent="#accordionControleEntrega">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/graficoentregas.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tile">
                <h3 class="tile-title text-center">CONTROLE DE RECEBIMENTO</h3>
                <div class="tile-body">
                    <div class="accordion" id="accordionControleRecebimento">
                        <div class="card">
                            <div class="card-header" id="headingCriarRecebimento">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOneReceber" aria-expanded="true" aria-controls="collapseOneReceber">
                                        <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: -3px;"></i>RECEBER EQUIPAMENTO
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOneReceber" class="collapse" aria-labelledby="headingCriarRecebimento" data-parent="#accordionControleRecebimento">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/receberequipamento.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingGraficoRecebimento">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFourReceber" aria-expanded="false" aria-controls="collapseFourReceber">
                                        <i class="fa fa-bar-chart" aria-hidden="true" style="margin-top: -3px;" ></i>GRÁFICO DOS RECEBIMENTOS
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFourReceber" class="collapse" aria-labelledby="headingGraficoRecebimento" data-parent="#accordionControleRecebimento">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/graficorecebimentos.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>    