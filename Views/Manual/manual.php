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
                    <div class="accordion" id="accordionUsuarios">
                        <div class="card">
                            <div class="card-header" id="headingCriar">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fa fa-plus-circle" aria-hidden="true" style="margin-top: -3px;"></i>CRIAR USUÁRIO
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingCriar" data-parent="#accordionUsuarios">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/criarusuario.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingAlterar">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fa fa-pencil-alt" aria-hidden="true" style="margin-top: -3px;"></i>ALTERAR USUÁRIO
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingAlterar" data-parent="#accordionUsuarios">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/alterarusuario.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingRemover">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fa fa-trash-alt" aria-hidden="true" style="margin-top: -3px;"></i>REMOVER USUÁRIO
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingRemover" data-parent="#accordionUsuarios">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/removerusuario.mp4" type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingGrafico">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fa fa-bar-chart" aria-hidden="true" style="margin-top: -3px;" ></i>GRÁFICO DE USUÁRIO
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingGrafico" data-parent="#accordionUsuarios">
                                <div class="card-body">
                                    <video controls class="w-100">
                                        <source src="<?= media(); ?>/videos/graficousuario.mp4" type="video/mp4" />
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