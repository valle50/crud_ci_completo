<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($titulo) ? $titulo : null; ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="<?php echo base_url().'assets/'; ?>jquery-3.3.1.min.js"></script>
</head>
<body>
	
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"><!-- nav -->

      <a class="navbar-brand" href="#">CRUD Empleados login</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">

        <ul class="navbar-nav mr-auto">

          <li class="nav-item <?php echo isset($active_inicio) ? $active_inicio : null; ?>">
            <a class="nav-link" href="<?php echo base_url().'Empleado_controller'; ?>">Inicio <span class="sr-only"></span></a>
          </li>

          <li class="nav-item <?php echo isset($active_nuevo) ? $active_nuevo : null; ?>">
            <a class="nav-link" href="<?php echo base_url().'Empleado_controller/form_nuevo_empleado'; ?>">Nuevo <span class="sr-only"></span></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>

            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Inicio</a>
              <a class="dropdown-item" href="#">Alta</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>

        <label class="navbar-brand"><?php echo 'Bienvenido '.$this->session->userdata('nombre_usuario'); ?></label>

        <form class="form-inline my-2 my-lg-0">

          <a href="<?php echo base_url().'Logout_controller/logout' ?>" class="btn btn-outline-success my-2 my-sm-0">Cerrar sesión</a>

        </form>
      </div>

    </nav><!-- nav -->


      <div class="container">
      	<br>
      	<br>
      	<br>
      </div>

      <!-- contenido -->