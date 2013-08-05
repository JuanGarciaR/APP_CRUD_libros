<!DOCTYPE html>
<html lang="es-CL">
  <head>
    <?php 
    	require_once("head.php");
    ?>
  </head>
  <body>
  	<div class="navbar navbar navbar-inverse navbar-fixed-top">
	  <?php 
	  	require_once("nav.php");
	  ?>
	</div>
	<div class="container">
		<h2>Bienvenidos a la aplicación realizada con MongoDB y PHP</h2>
		<p class="text-info">En esta app podremos listar, agregar, modificar y eliminar libros.</p><br><br>
		<form class="form-horizontal" action="editar_libro.php" method="post">
			<?php 
				require_once("connect_libros.php");

				$id =  $_GET['id'];
				$condicion = array("_id" => new  MongoId($id));
				if($c_libros->count($condicion) == 1){
					$libros = $c_libros->findOne($condicion);
				}
				$nameAutor = $libros['autor'];
			?>
		  	<div class="control-group">
		    	<label class="control-label" for="inputNameLibro">Nombre del Libro</label>
		    	<div class="controls">
		      		<input type="text" name="nameLibro" id="inputNameLibro" class="input-xlarge" placeholder="Nombre del Libro" value="<?php echo $libros['nombre'] ?>"/>
		    	</div>
		  	</div>
			<div class="control-group">
		    	<label class="control-label" for="inputAutor">Nombre del Autor</label>
		    	<div class="controls">
		      		<select name="autor">
		      			<?php
							require_once("connect_autores.php");

							if ($c_autores->count()>0)
							{
								$autores = $c_autores->find();
								foreach ($autores as $autor) {
									if($autor['nombre'] == $nameAutor){

						?>
							<option value="<?php echo $autor['nombre'] ?>" selected="selected"><?php echo $autor['nombre'] ?></option>
						<?php 
							}else{
						?>
							<option value="<?php echo $autor['nombre'] ?>"><?php echo $autor['nombre'] ?></option>
						<?php 
									}
								}
							}else{
						?>
						<option value="Sin Autor">Sin Autor</option>
						<?php } ?>
		      			
		      		</select>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<label class="control-label" for="inputAutor">Breve descripción del libro</label>
		    	<div class="controls">
		      		<textarea name="descripcion" rows="6" class="input-xlarge"><?php echo $libros['descripcion'] ?></textarea>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<div class="controls">
		    		<input type="hidden" name="id" value="<?php echo $id ?>" />
		      		<button type="submit" class="btn btn-large btn-primary"><i class="icon-book icon-white"></i> Guardar Libro</button>
		    	</div>
		  	</div>
		</form>
		<footer>
		  <p>Desarrollado por @JuanGarciaR</p>
		</footer>
	</div> <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>