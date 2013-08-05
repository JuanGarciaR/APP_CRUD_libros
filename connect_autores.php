<?php 
	$mongo = new Mongo();
	$db = $mongo->selectDB("librosdb");
	$c_autores = $mongo->selectCollection($db,"autores");
?>