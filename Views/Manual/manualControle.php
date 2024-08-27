<?php headerAdmin($data); getModal('modalManual',$data);?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1>
                    <i class="fa fa-users" aria-hidden="true"></i> <?= $data['page_title'] ?>
                </h1>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>    