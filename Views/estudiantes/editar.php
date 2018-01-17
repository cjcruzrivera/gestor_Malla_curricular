<?php $secciones = $estudiantes->listar_secciones(); ?>
<div class="box-principal">
<h3 class="titulo">Editar estudiantes<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar estudiante <?php echo $datos['nombre']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-3">
	  			<div class="panel panel-default">
				  <div class="panel-body">
				    <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/<?php echo $datos['imagen']; ?>">
				  </div>
				</div>
	  		</div>
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
						<div class="form-group">
				      <label  class="control-label">Editar Imagen</label>
				        <input class="form-control" name="imagen" id="imagen" type="file">
				    </div>
						<div hidden class="form-group">
				      <label  class="control-label"></label>
				        <input class="form-control" name="imagen_old" id="imagen_old" type="text" value = "<?php echo $datos['imagen']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Nombre del estudiante</label>
				        <input class="form-control" value="<?php echo $datos['nombre']; ?>" name="nombre" type="text" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Edad</label>
				        <input class="form-control" value="<?php echo $datos['edad']; ?>" name="edad" type="number" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Promedio</label>
				        <input class="form-control" value="<?php echo $datos['promedio']; ?>" name="promedio" type="number" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Sección (<b>Sección Actual: <?php echo $datos['nombre_seccion']; ?></b>)</label>
				      <select id = "id_seccion" name="id_seccion" class="form-control">
								<option value="0">Seleccione una seccion</option>
														<?php
														//print_r($datos);
															while($row = pg_fetch_array($secciones)){
																if($datos['nombre_seccion'] != $row['nombre']){
																	?>
																			<option value="<?php echo $row['id']?>"><?php echo $row['nombre']?></option>
																	<?php
																}else{
																	?>
																			<option selected value="<?php echo $row['id']?>"><?php echo $row['nombre']?></option>
																	<?php
																}	
															}
														?>
				      </select>
							<script></script>
				    </div>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>