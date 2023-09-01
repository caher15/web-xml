<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Borrar</title>
	<link rel="stylesheet" href="./borrar.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body>
<header>
        <a href="./escribir.php">Inicio</a>
    </header>
	<div class="container">
		<?php 
		$xml = new DOMDocument(); 
		$xml -> load('datos.xml'); 
		$nodoslista=$xml->getElementsByTagName('usuario');
		$remover=null;
		for($i = 0; $i < $nodoslista->length; $i++){
			$lista=$nodoslista->item($i)->childNodes; 
			for($j = 0; $j < $lista->length; $j++){
				if(((string) $lista->item($j)->nodeName)=='edad' && ((string) $lista->item($j)->nodeValue)=='19'){
					$remover=$nodoslista->item($i);
					break 2;
				}
			}
		}
		if($remover != null){
			$remover->parentNode->removeChild($remover);
			$xml->save ('datos.xml');
			echo '<h1>Operación realizada con éxito</h1>';
			echo '<div class="success">El usuario ha sido eliminado</div>';
		}
		?>
		
	</div>
</body>
</html>