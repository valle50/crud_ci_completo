
<div class="container">

	<button class="btn btn-primary float-right" id="btnNuevo">Nuevo empleado</button>
	<br><br>


	<table class="table table-hover">

	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>Nombre</th>
	      <th>Apellidos</th>
	      <th>Sexo</th>
	      <th>Teléfono</th>
	      <th>Edad</th>
	      <th>Cargo</th>
	      <th>Fecha de ingreso</th>
	      <th>Días en la empresa</th>
	      <th>Acción</th>
	    </tr>
	  </thead>

	  <tbody id="tbl_contenido">
		<?php foreach ($empleados as $item) { ?>
			<tr>
				<td><?php echo $item->Id; ?></td>
				<td><?php echo $item->nombre; ?></td>
				<td><?php echo $item->apellidos; ?></td>
				<td><?php echo $item->sexo; ?></td>
				<td><?php echo $item->telefono; ?></td>
			 	<td><?php echo $item->edad; ?></td>
				<td><?php echo $item->cargo; ?></td>
				<td><?php echo $item->fecha_ingreso; ?></td>
				<td><?php echo $item->dias_trabajo; ?></td>
				<td>
					<button class="btn btn-primary btn-sm btnModificar" data-id="<?php echo $item->Id; ?>">Modificar</button>
					<button class="btn btn-danger btn-sm btnEliminar" data-id="<?php echo $item->Id; ?>">Eliminar</button>
				</td>				
			</tr>
		<?php } ?>
	  </tbody>

	</table>

</div>

<script>
	$(document).ready(function(){

		$('#btnNuevo').click(function(){
			window.open('<?php echo base_url(); ?>Empleado_controller/form_nuevo_empleado/');
		});

		$('.btnModificar').click(function(){

			if(confirm('¿Desea modificar este registro?')){

				var id = $(this).data('id');
			
				window.open('<?php echo base_url(); ?>Empleado_controller/form_actualiza_empleado/' + id);
			}
			
		});

		$('.btnEliminar').click(function(e){

			e.preventDefault();

			if(confirm('¿Seguro que desea eliminar este registro?')){

				var id = $(this).data('id');
				var _this = $(this);
			
				$.ajax({
					url: "<?php base_url() ?>Empleado_controller/delete_empleado/" + id,
					dataType: "json"
				})
				.done(function(data){

					if(data.Respuesta){

						_this.closest('tr').remove();
						alert('Registro eliminado correctamente');
						
					}

				})
				.fail(function(data){
					console.error('Ocurrió un error al enviar los datos');
					console.log(data.responseText);
				});
			}
		});
	});
</script>