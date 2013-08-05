<?php
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_autores = $mongo->selectCollection("librosdb","autores");

	/////////////////////////////////
	$id = $_GET["id"];
	$condicion = array("_id" => new MongoId($id));
	if ($c_autores->count($condicion) == 1)
	{
		$c_autores->remove($condicion);
		header("Refresh: 0;url=autores.php?mensaje=1");
	}else{

	}
?>