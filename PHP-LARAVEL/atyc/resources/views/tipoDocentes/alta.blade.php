<div class="box box-success ">
	<div class="box-header">Nuevo tipo de docente</div>
	<div class="box-body">
		<form id="form-alta"> 
			{{ csrf_field() }}
			<div class="row">
				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
					<label for="nombre" class="control-label col-xs-4">Nombre:</label>
					<div class="col-xs-8">
						<input type="text" class="form-control" id="nombre" name="nombre" required>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="box-footer">
		<button class="btn btn-warning" id="volver" title="Volver"><i class="fa fa-undo" aria-hidden="true"></i>Volver</button>
		<button class="btn btn-success pull-right" id="crear" title="Alta" type="submit"><i class="fa fa-plus" aria-hidden="true"></i>Alta</button>
	</div>
</div> 