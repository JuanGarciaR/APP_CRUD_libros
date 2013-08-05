<?php
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_libros = $mongo->selectCollection($db,"libros");

	/////////////////////////////////
	$id = $_POST['id'];
	$nameLibro = $_POST['nameLibro'];
	$autor = $_POST["autor"];
	$id = $_POST["id"];
	$descripcion = $_POST['descripcion'];
	////////////////////////////////////

	$condicion = array("_id" => new MongoId($id));
	$modLibro = array("nombre"=>$nameLibro, "autor"=>$autor, "descripcion"=>$descripcion);
	$c_libros->update($condicion, $modLibro);

	header("Refresh: 0;url=index.php?mensaje=3")
?>