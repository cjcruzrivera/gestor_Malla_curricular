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
	  		<div class="col-md-3"><button class = "button_malla">
					<a href="#" target = "_blank"> 
						Consultar Malla Curricular
					</a></button>
				</div>				
	  		</div>
	  		<div class="col-md-9">
				    <div class="form-group">
				      <label  class="control-label">Nombre del estudiante</label>
				        <label class = "form-control"><?php echo $datos['nombre']; ?></label>
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Edad</label>
							<label class = "form-control"><?php echo $datos['edad']; ?></label>							
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Promedio</label>
							<label class = "form-control"><?php echo $datos['promedio']; ?></label>														
				    </div>
				    <div class="form-group">
				      <label  class="control-label">Programa</label>
							<label class = "form-control"><?php echo $datos['nombre_programa']; ?></label>							
				    </div>
				
	  		</div>
	  	</div>
	  </div>
	</div>
</div>