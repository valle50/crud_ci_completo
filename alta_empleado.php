
<div class="container"><!-- contenedor -->

	<h2>Registrar nuevo empleado</h2>
	
	<form id="form-alta">
		
		<div class="row"><!-- row1 -->

			<div class="col-md-3">
				<label>Nombre</label>
				<input type="text" class="form-control" name="nombre" id="nombre">
			</div>

			<div class="col-md-3">
				<label>Apellidos</label>
				<input type="text" class="form-control" name="apellidos">
			</div>

			<div class="col-md-3">
				<label>Sexo</label><br>

				<input type="radio" name="sexo" id="m" value="Masculino">
				<label for="m">Masculino</label>

				<input type="radio" name="sexo" id="f" value="Femenino">
				<label for="f">Femenino</label>
			</div>

			<div class="col-md-3">
				<label>Teléfono</label>
				<input type="text" class="form-control" name="telefono">
			</div>

		</div><!-- row1 -->
	

		<div class="row"><!-- row2 -->

			<div class="col-md-4">
				<label>Fecha de nacimiento</label>
				<input type="date" class="form-control" name="fecha_cumple">
			</div>

			<div class="col-md-4">
				<label>Fecha de ingreso</label>
				<input type="date" class="form-control" name="fecha_ingreso">
			</div>

			<div class="col-md-4">
				<label>Cargo</label>
				<select class="form-control" name="id_cargo">

					<?php foreach($cargos as $item){ ?>

						<option value="<?php echo $item->Id; ?>"> <?php echo $item->cargo; ?></option>

					<?php } ?>

				</select>
			</div>

		</div><!-- row2 -->
		
		<br>
		<div class="row"><!-- row3 -->

			<div class="col-md-5"></div>
			<div class="col-md-2">
				<button class="btn btn-success btn-block" id="btnGuardar">Guardar</button>
			</div>
			<div class="col-md-5"></div>

		</div>	<!-- row3 -->

	</form>

</div><!-- contenedor -->

<script>
	$(document).ready(function(){

		$('#btnGuardar').click(function(e){


			e.preventDefault();

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>Empleado_controller/insert_empleado/",
				dataType: "json",
				data: $('#form-alta').serialize()
			})
			.done(function(data){

				if(data.Respuesta){

					$('#form-alta').trigger("reset");
					alert('Registro almacenado correctamente');

				}else{

					var mensajes = '';

					$.each(data, function(key, element) {
						
                  		mensajes += element +'\n';
                	});  

                	alert(mensajes);
				}

			})
			.fail(function(data){
				console.error('Ocurrió un error al enviar los datos');
				console.log(data.responseText);
				$('body').html(data.responseText);
			});//ajax
			

		});//botón


	});//reaedy
</script>
