<?php 
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_libros = $mongo->selectCollection($db,"libros");
?>