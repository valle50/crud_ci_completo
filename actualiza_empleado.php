
<div class="container"><!-- contenedor -->

	<h2>Actualiza datos de empleado</h2>
	
	<form id="form-actualiza">
		
		<div class="row"><!-- row1 -->

			<div class="col-md-3">
				<label>Nombre</label>
				<input type="text" class="form-control" name="nombre" value="<?php echo $empleado->nombre; ?>">
			</div>

			<div class="col-md-3">
				<label>Apellidos</label>
				<input type="text" class="form-control" name="apellidos" id="" value="<?php echo $empleado->apellidos; ?>">
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
				<input type="text" class="form-control" name="telefono" value="<?php echo $empleado->telefono; ?>">
			</div>

		</div><!-- row1 -->
	

		<div class="row"><!-- row2 -->

			<div class="col-md-4">
				<label>Fecha de nacimiento</label>
				<input type="date" class="form-control" name="fecha_cumple" id="fecha_cum" value="<?php echo $empleado->fecha_cumple; ?>">
			</div>

			<div class="col-md-4">
				<label>Fecha de ingreso</label>
				<input type="date" class="form-control" name="fecha_ingreso" id="fecha_ing" value="<?php echo $empleado->fecha_ingreso; ?>">
			</div>

			<div class="col-md-4">
				<label>Cargo</label>
				<select class="form-control" name="id_cargo" id="slt_cargos">

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
				<button class="btn btn-success btn-block" id="btnActualiza" data-id="<?php echo $empleado->Id; ?>">Actualizar</button>
			</div>
			<div class="col-md-5"></div>

		</div>	<!-- row3 -->

	</form>

</div><!-- contenedor -->

<script>
	$(document).ready(function(){

		// Marca los radios de acuerdo al valor
		$('#m[value="<?php echo $empleado->sexo ?>"]').prop('checked', true);
		$('#f[value="<?php echo $empleado->sexo ?>"]').prop('checked', true);

		// Selecciona la opción de acuerdo al valor
		$('#slt_cargos option[value="<?php echo $empleado->id_cargo ?>"]').prop('selected', true);

		// Actualiza registros
		$('#btnActualiza').click(function(e){

			e.preventDefault();

			var id_empleado = $(this).data('id');

			$.ajax({
				type: "POST",
				url: "<?php echo base_url() ?>Empleado_controller/update_empleado/"+ id_empleado,
				dataType: "json",
				data: $('#form-actualiza').serialize()
			})
			.done(function(data){

				if(data.Respuesta){

					location.reload();	
					alert('Registro actualizado correctamente');
					
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
			});

		});
	});
</script>
