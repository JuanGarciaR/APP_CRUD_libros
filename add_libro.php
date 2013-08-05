<?php
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_libros = $mongo->selectCollection("librosdb","libros");

	//////////////////////////////////////
	$nameLibro = $_POST["nameLibro"];
	$autor = $_POST["autor"];
	$descripcion = $_POST["descripcion"];
	//////////////////////////////////////

	$nuevoLibro = array("nombre"=>$nameLibro,"autor"=>$autor,"descripcion"=>$descripcion);
	$c_libros->insert($nuevoLibro);

	header("Refresh: 0;url=index.php?mensaje=2")
?>