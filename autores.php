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
		<h2>Sección de Autores</h2>
		<p class="text-info">Aquí podremos listar, agregar, modificar y eliminar autores.</p>
		<form class="form-horizontal" action="add_autor.php" method="post">
		  	<div class="control-group">
		    	<label class="control-label" for="inputNameAutor">Nombre del Autor</label>
		    	<div class="controls">
		      		<input type="text" name="inputNameAutor" id="inputNameAutor" class="input-xlarge" placeholder="Nombre del Autor"/>
		    	</div>
		  	</div>
		  	<div class="control-group">
		    	<div class="controls">
		      		<button type="submit" class="btn btn-large btn-primary"><i class="icon-user icon-white"></i> Guardar Autor</button>
		    	</div>
		  	</div>
		</form>

		<h3>Lista de autores almacenados</h3>
		<?php
			error_reporting(0);
			$mensaje = $_GET["mensaje"];
			if ($mensaje == 1) {
				echo "<p class='btn  btn-danger'><i class='icon-trash icon-white'></i> El autor fue eliminado con éxito.</p><br><br>";
			}
			if ($mensaje == 2) {
				echo "<p class='btn  btn-success'><i class='icon-ok icon-white'></i> El autor fue guardado con éxito.</p><br><br>";
			}
			if ($mensaje == 3) {
				echo "<p class='btn  btn-warning'><i class='icon-refresh icon-white'></i> El autor fue modificado con éxito.</p><br><br>";
			}
		?>
		<table class="table table-striped table-bordered">
			<thead>
			    <tr class="tr-head">
			    	<th>Nombre del Autor</th>
			    	<th>Modificar</th>
			    	<th>Eliminar</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					require_once("connect_autores.php");

					if ($c_autores->count()>0) {
						$row = $c_autores->find();
						foreach ($row as $nameAutor) {
				?>
				<tr>
					<td><?php echo $nameAutor["nombre"]; ?></td>
					<td><a href="mod_autor.php?id=<?php echo $nameAutor["_id"]; ?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i> Modificar</a></td>
					<td><a href="eliminar_autor.php?id=<?php echo $nameAutor["_id"]; ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Eliminar</a></td>
				</tr>	
				<?php
						}
					}else{
				?>
				<tr>
					<td colspan="3"><i class="icon-info-sign"></i> Sin registros en la Base de Datos</h4></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<footer>
		  <p>Desarrollado por @JuanGarciaR</p>
		</footer>
	</div> <!-- /container -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>