!<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Usuarios</title>
</head>
<body>
	<?php
		if(!$usuarios=simplexml_load_file('datos.xml')){
			echo "No se puede ingresar";
		}
		else{
			foreach($usuarios as $usuario){
				echo 'Nombre: ';
				echo "<h1>".$usuario->nombre."</h1>";

				echo '&ensp;&ensp;&ensp;&ensp;Fecha de nacimiento: ';
				echo $usuario->{"fecha-nacimiento"};

				echo '&ensp;&ensp;&ensp;Sexo: ';
				echo $usuario->nombre["sexo"];

				echo '&ensp;&ensp;&ensp;Mes: ';
				$mesUsuario=$usuario->{"fecha-nacimiento"}["m"];
				echo $usuario->{"fecha-nacimiento"}["m"];

				echo '&ensp;&ensp;&ensp;Edad: ';
				echo $usuario->edad . "<br><br>";
			}
		}
	?>
</body>
</html>