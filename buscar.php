<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Buscar</title>
	<link rel="stylesheet" href="./buscar.css">
</head>
<body>
<header>
        <a href="./escribir.php">Inicio</a>
    </header>
	<div class="container">
	<?php
	$xml = new DOMDocument();
	$xml->load('datos.xml');
	$nodoslista=$xml->getElementsByTagName('usuario');
	for($i = 0; $i < $nodoslista->length; $i++){

		$lista=$nodoslista->item($i)->childNodes;
		for($j = 0; $j < $lista->length; $j++){

			if(((string) $lista->item($j)->nodeName)=='edad' && ((string) $lista->item($j)->nodeValue)=='19'){
				echo '<div class="result">';
          		echo $lista->item(0)->nodeValue;
          		echo '</div>';      
          		break 2;
			}
		}
	}
	?>
	<a href="borrar.php" class="btnLink">Ir a borrar</a>
	<a href="modificar.php" class="btnLink">Ir a modificar</a>
    </div>
  <div class="footer">
     USUARIO ENCONTRADO EN DATOS XML
  </div>
</body>
</html>