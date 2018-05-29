<?php 
include('class/Conexion.php');
include('class/Categoria.php');
include('class/Palabras.php');

$categoria=Categoria::singleton();
$palabra=Palabra::singleton();

if (isset($_GET['categoria']) && isset($_GET['palabra'])):
	echo json_encode($palabra->getPalabras($_GET['categoria'],$_GET['palabra']));
else:
	echo json_encode($categoria->getCategorias());
endif;



?>
