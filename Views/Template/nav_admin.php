    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar app-sidebar-2">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/logoControle-removebg-preview-fotor.png" alt="Usuario">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres'] ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></b></i></p>
          <p class="app-sidebar__user-designation">Empresa: <i><b><?= $_SESSION['ruta'] ?></b></i></p>
        </div>
      </div>
      <ul class="app-menu">
        <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
        <!-- <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-dashboard" aria-hidden="true"></i>
                <span class="app-menu__label">Dashboard</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/dashboard"><i class="icon fa fa-circle-o"></i> Usuários</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/dashboard/equipamentos"><i class="icon fa fa-circle-o"></i> Equipamentos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/dashboard/controle"><i class="icon fa fa-circle-o"></i> Controle</a></li>
            </ul>
        </li> -->
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r']) AND $_SESSION['idUser'] == 1){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-secret" aria-hidden="true"></i>
                <span class="app-menu__label">Admin</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuários</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Cargos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/rutas"><i class="icon fa fa-circle-o"></i> Empresas</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuários</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/aprendizes"><i class="icon fa fa-circle-o"></i> Aprendizes</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/operacao"><i class="icon fa fa-circle-o"></i> Operadores</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/lideres"><i class="icon fa fa-circle-o"></i> Líderes</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/gestores"><i class="icon fa fa-circle-o"></i> Monitores de Qualidade</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/coordinadores"><i class="icon fa fa-circle-o"></i> Coordenadores</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/supervisores"><i class="icon fa fa-circle-o"></i> Supervisores</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/gerentes"><i class="icon fa fa-circle-o"></i> Gerentes</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/dp"><i class="icon fa fa-circle-o"></i> DP</a></li>
            </ul>
        </li>
        <?php } ?>
        <!-- <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Equipamentos</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <?php if(!empty($_SESSION['permisos'][MFONE]['r'])){ ?>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/fones"><i class="icon fa fa-circle-o"></i> Fones</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MCOMPUTADOR]['r'])){ ?>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/computadores"><i class="icon fa fa-circle-o"></i> Computadores</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MTELA]['r'])){ ?>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/telas"><i class="icon fa fa-circle-o"></i> Monitores</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MTECLADO]['r'])){ ?>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/teclados"><i class="icon fa fa-circle-o"></i> Teclados</a></li>
                <?php } ?>
                <?php if(!empty($_SESSION['permisos'][MMOUSE]['r'])){ ?>
                    cli_set_process_title<li><a class="treeview-item" href="<?= base_url(); ?>/mouses"><i class="icon fa fa-circle-o"></i> Mouses</a></li>
                <?php } ?>
            </ul>
        </li> -->
        <li>
          <a class="app-menu__item" href="<?= base_url(); ?>/fones">
            <i class="app-menu__icon fa fa-headphones" aria-hidden="true"></i>
            <span class="app-menu__label">Fones</span>
          </a>
        </li>
        <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-clipboard" aria-hidden="true"></i>
                <span class="app-menu__label">Controle</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/entregar"><i class="icon fa fa-circle-o"></i> Entregues</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/receber"><i class="icon fa fa-circle-o"></i> Recebidos</a></li>
            </ul>
        </li>
        <?php } ?>
        
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>

      <ul class="app-menu">
        <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-book" aria-hidden="true"></i>
                    <span class="app-menu__label">Manual de ajuda</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="<?= base_url(); ?>/manual/manualEquipamentos"><i class="icon fa fa-circle-o"></i> Equipamentos</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/manual"><i class="icon fa fa-circle-o"></i> Usuários</a></li>
                    <li><a class="treeview-item" href="<?= base_url(); ?>/manual/manualControle"><i class="icon fa fa-circle-o"></i> Controle</a></li>
                </ul>
            </li>
        <?php } ?>
      </ul>
    </aside>