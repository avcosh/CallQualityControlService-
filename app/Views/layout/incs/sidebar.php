<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Меню</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           
			    <li class="nav-item">
                <a href="<?= base_url(route_to('tracking.index')) ?>" class="nav-link <?= (base_url(route_to('tracking.index')) === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Отслеживания</p>
                </a>
                </li>
				
				<li class="nav-item">
                <a href="<?= base_url(route_to('crmresult.index')) ?>" class="nav-link <?= (base_url(route_to('crmresult.index')) === rtrim(current_url(), '/')) ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Результат в CRM</p>
                </a>
              </li>
             
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
