<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>LOGIN Empleados</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/'; ?>bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>jquery-3.3.1.min.js"></script>

</head>
<body style="background-color: cyan;">
    <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-4">Sistema empleados</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0 text-center">Iniciar sesión</h3>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin">

                                <div class="form-group">
                                    <label for="usr">Nombre de usuario</label>
                                    <input type="text" class="form-control form-control-lg" name="usr" id="usr">
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg" name="pwd" id="pwd">
                                </div>

                                <button class="btn btn-success btn-lg btn-block" id="btnLogin">Entrar</button>
                            </form>
                        </div>
                        <!--/card-body-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->

<script type="text/javascript" src="<?php echo base_url().'assets/'; ?>bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){

        $('#btnLogin').click(function(e){

              e.preventDefault();

              $.ajax({
                  type:"POST",
                  url: "<?= base_url() ?>Login_controller/login_usuario",
                  dataType: "JSON",
                  data: $("#formLogin").serialize()
              })          
              .done(function(data){

                  //Si se realizó correcatemnte el login, se enviará a la página de empleados
                  if(data.Respuesta){

                    window.location = "<?php echo base_url().'Empleado_controller'; ?>";
                    
                  }

                  if(data.Respuesta == false){

                      alert('Usuario y/o contraseña incorrectos');

                  }

                  //Si no recibe ningún "data.Respuesta", es porque está enviando al data los mensajes de validación
                  if(data.Validaciones){

                    var mensajes = '';
          
                    //Recorre el array de validaciones (lo que recibe data) para mostrarlos en un alert
                    $.each(data.Validaciones, function(key, element){

                      mensajes += element + '\n';
                    });

                    alert(mensajes);
                  }

              })
              .fail(function(data){            
                  console.error('Hubo un problema al enviar datos de login.');
                  $('body').html(data.responseText);
              });

        });
    });    
</script>
</body>
</html>



