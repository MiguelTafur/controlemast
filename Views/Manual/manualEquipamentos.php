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
                <div class="tile-body">
                    <div class="accordion" id="accordionEquipamentos">
                        <div class="card">
                            <div class="card-header" id="headingCriar">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: -3px;"></i>CRIAR EQUIPAMENTO
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingCriar" data-parent="#accordionEquipamentos">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/criarequipamento.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingAnotacao">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                        <i class="fa fa-file-text" aria-hidden="true" style="margin-top: -3px;"></i>ADICIONAR ANOTAÇÃO
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseFive" class="collapse" aria-labelledby="headingAnotacao" data-parent="#accordionEquipamentos">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/adicionarAnotacao.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingAlterar">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-pencil-alt" aria-hidden="true" style="margin-top: -3px;"></i>ALTERAR INFORMAÇÃO
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingAlterar" data-parent="#accordionEquipamentos">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/alterarequipamento.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingRemover">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-wrench" aria-hidden="true" style="margin-top: -3px;"></i>ALTERAR O ESTADO
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingRemover" data-parent="#accordionEquipamentos">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/alterarestadoequipamento.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingGrafico">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fa fa-bar-chart" aria-hidden="true" style="margin-top: -3px;" ></i>GRÁFICOS
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingGrafico" data-parent="#accordionEquipamentos">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/graficoEquipamentos.mp4" type="video/mp4" />
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