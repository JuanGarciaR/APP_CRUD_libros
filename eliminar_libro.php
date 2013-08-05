<?php
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_libros = $mongo->selectCollection($db,"libros");

	/////////////////////////////////
	$id = $_GET["id"];
	////////////////////////////////
	$condicion = array("_id" => new MongoId($id));
	if ($c_libros->count($condicion) == 1){
		$c_libros->remove($condicion);
	}
	
	header("Refresh: 0;url=index.php?mensaje=1");
?>