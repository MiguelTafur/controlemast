    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar app-sidebar-2">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/logoControle-removebg-preview-fotor.png" alt="Usuario">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres'] ?></p>
          <p class="app-sidebar__user-designation">Empresa: <i><b><?= $_SESSION['ruta'] ?></b></i></p>
          <!-- <p class="app-sidebar__user-designation">Moneda: <i><b><?= 'BRL'.' ('.SMONEY.')' ?></b></i></p> -->
        </div>
      </div>
      <ul class="app-menu">
        <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][2]['r']) AND $_SESSION['idUser'] == 1){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuários</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/usuarios"><i class="icon fa fa-circle-o"></i> Usuários</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Cargos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/rutas"><i class="icon fa fa-circle-o"></i> Empresas</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/lideres">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Líderes</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/operacao">
                <i class="app-menu__icon fa fa-user" aria-hidden="true"></i>
                <span class="app-menu__label">Operação</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/equipamentos">
                <i class="app-menu__icon fa fa-cogs" aria-hidden="true"></i>
                <span class="app-menu__label">Equipamentos</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/controle">
                <i class="app-menu__icon fa fa-th" aria-hidden="true"></i>
                <span class="app-menu__label">Controle</span>
            </a>
        </li>
        <?php } ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>