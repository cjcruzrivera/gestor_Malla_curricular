<?php ?>
<div class="box-principal">
<h3 class="titulo">VISTA GENERAL ESTUDIANTE<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Viendo estudiante <?php echo $datos['nombre']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-3">
	  			<div class="panel panel-default">
				  <div class="panel-body">
                  <a href="<?php echo URL;?>Views/template/imagenes/<?php echo $datos['imagen']; ?>"  target="_blank">
				    <img class="img-responsive" src="<?php echo URL;?>Views/template/imagenes/<?php echo $datos['imagen']; ?>">
                    </a>
                  </div>
				</div>
	  		</div>
	  		<div class="col-md-9">
					<div hidden class="form-group">
				      <label  class="control-label"></label>
				        <input readonly class="form-control" name="imagen_old" id="imagen_old" type="text" value = "<?php echo $datos['imagen']; ?>" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Nombre del estudiante</label>
				        <input readonly class="form-control" value="<?php echo $datos['nombre']; ?>" name="nombre" type="text" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Edad</label>
				        <input readonly class="form-control" value="<?php echo $datos['edad']; ?>" name="edad" type="number" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Promedio</label>
				        <input readonly class="form-control" value="<?php echo $datos['promedio']; ?>" name="promedio" type="number" required>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Sección</label>
                        <input readonly class="form-control" value="<?php echo $datos['nombre_seccion']; ?>" name="nombre_seccion" type="text" required>				      
				    </div>
				
	  		</div>
	  	</div>
	  </div>
	</div>
</div>