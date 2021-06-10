  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="elevation-3">VS</span>
      <span class="brand-text font-weight-light">hop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>
                <?php
                  echo $this->session->userdata('nombre').' '.$this->session->userdata('apellido_paterno').' '.$this->session->userdata('apellido_materno');
                ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url();?>CUsuario" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Datos Generales</p>
                </a>
              </li>
            </ul>            
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>CTienda" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tienda(s)</p>
            </a>
          </li>
          <?php if( $this->session->userdata('rol_id')==1 ){ ?>
          <li class="nav-item">
            <a href="<?php echo base_url();?>CUsuario" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>Usuario(s)</p>
            </a>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>