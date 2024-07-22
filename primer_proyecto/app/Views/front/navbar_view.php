<?php
  $session = session();
  $nombre = $session->get('nombre');
  $perfil = $session->get('perfil_id');
?>
<nav class="navbar navbar-expand-lg bg-primary border-bottom" data-bs-theme="dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand me-auto barra" href="<?php echo base_url('principal')?>">
        <!-- logo/marca de la empresa-->
        <img src="<?php echo base_url('assets/img/icons8-collectibles-64.png')?>" alt="marca" width="45" height="30" class="img-fluid"/>

      </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <?php if (session()->perfil_id == 1): ?>
      <div class="btn btn-secondary active btnUser btn-sm">
        <a href="">ADMIN:  <?php echo session('nombre'); ?> </a>

      </div>  
    
    <!--<a class="navbar-brand" href="#">Navbar</a>-->
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link " href="lista_usuarios">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="quienes_somos">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="acercade">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registro">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('/logout');?>" >Cerrar Sesion</a>
        </li>
        <?php elseif(session()->perfil_id == 2): ?>
          <div class="btn btn-secondary active btnUser btn-sm">
            <a href="">CLIENTE:  <?php echo session('nombre'); ?> </a>
          </div>  
          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Articulos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Celulares</a></li>
            <li><a class="dropdown-item" href="#">Accesorios</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('/logout');?>" >Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
      <?php else:?>
        <!-- NAVBAR PARA CLIENTES NO LOGUEADOS -->
        <!--<a class="navbar-brand" href="#">Navbar</a>-->
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " href="quienes_somos">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="acercade">Acerca de</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registro">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
      <form class="d-flex" role="buscar">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form>
      <?php endif;?>
    </div>
  </div>
</nav>