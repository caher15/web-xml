<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar</title>
	<link rel="stylesheet" href="./modificar.css">
	

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
		$modificar=null;
		for($i = 0; $i<$nodoslista->length; $i++){
			$lista=$nodoslista->item($i)->childNodes; 
			for($j = 0; $j < $lista->length; $j++){
				if(((string) $lista->item($j)->nodeName)=='edad' && ((string) $lista->item($j)->nodeValue)=='19'){
					$atributo=$lista->item(0)->getAttribute("sexo");
					echo '<h1>'.$lista->item(0)->nodeValue.'</h1>';
					echo '<input type="text" value="'.$atributo.'"/>';
					$lista->item(2)->nodeValue="Modificado";
					$lista->item(2)->setAttribute('m', "00");
					$modificar=1;
					break 2;
				}
			}
		}
		if($modificar !=null){
			$xml->save ('datos.xml');
			echo '<div class="success">Modificación exitosa</div>';
		}
		?>
		<a href="datos.xml" class="btnLink">Verificar</a>
		<a href="buscar.php" class="btnLink">Regresar</a>
	</div>
</body>
</html>