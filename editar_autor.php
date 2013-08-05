<?php
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_autores = $mongo->selectCollection("librosdb","autores");

	/////////////////////////////////
	$nameAutor = $_POST["inputNameAutor"];
	$id = $_POST["id"];
	$condicion = array("_id" => new MongoId($id));
	$modAutor = array("nombre"=>$nameAutor);
	$c_autores->update($condicion, $modAutor);

	header("Refresh: 0;url=autores.php?mensaje=3")
?>