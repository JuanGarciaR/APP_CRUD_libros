<?php
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_autores = $mongo->selectCollection("librosdb","autores");

	/////////////////////////////////
	$nameAutor = $_POST["inputNameAutor"];
	$nuevoAutor = array("nombre"=>$nameAutor);
	$c_autores->insert($nuevoAutor);

	header("Refresh: 0;url=autores.php?mensaje=2")
?>