<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Escribir elementos XML Datos personales</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./desktop.css" media="screen and (min-widht: 900px)">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <a href="./index.php">Inicio</a>
    </header>
    <main>
        <section>
        <form class="form-container" id="form1" name="form1" method="post" action="escribir.php">
    <label for="nombre">
        <span>Nombre:</span>
        <input id="nombre" name="txtNombre" type="text">
    </label>
    <br>
    <label for="edad" >
        <span>Edad:</span>
        <input id="edad" name="txtEdad" type="text">
    </label>
    <h3>Fecha de nacimiento</h3>
    <label for="fecha-de-nacimiento" >
        <span>Día:</span>
        <input id="fecha-de-nacimiento" name="txtDiaNac" type="text">
    </label>
    <br>
    <label for="mesNac" >
        <span>Mes:</span>
        <select name="cmbMesNac" id="mesNac">
        <option value="01-Enero">Enero</option>
        <option value="02-Febrero">Febrero</option>
        <option value="03-Marzo">Marzo</option>
        <option value="04-Abril">Abril</option>
        <option value="05-Mayo">Mayo</option>
        <option value="06-Junio">Junio</option>
        <option value="07-Julio">Julio</option>
        <option value="08-Agosto">Agosto</option>
        <option value="09-Septiembre">Septiembre</option>
        <option value="10-Octubre">Octubre</option>
        <option value="11-Noviembre">Noviembre</option>
        <option value="01-Enero">Diciembre</option>
        </select>
    </label>
    <br>
    <label for="anioNac">
        <span>Año:</span>
        <input id="anioNac" name="txtAnioNac" type="text">
    </label>
    <h3>Sexo</h3>
    <p>
        <input type="radio" name="opbSexo" id="masculino" value="masculino"/>
        <label for="masculino">masculino</label>
    </p>
    <p>
        <input type="radio" name="opbSexo" id="femenino" value="femenino"/>
        <label for="femenino">femenino</label>
    </p>
    
        
</form>
        <div class="form-butom" >
        <input class="boton" type="submit" name="enviar" id="enviar" value="Enviar"/>
        <br>
        <form action="./leer.php">
            <input class="boton" type="submit" value="leer">
        </form>
        <form action="./datos.xml.php">
            <input class="boton" type="submit" value="Datos">
        </form>
        <form action="./borrar.php">
            <input class="boton" type="submit" value="Borrar">
        </form>
        <form action="./buscar.php">
            <input type="submit" value="Buscar">
        </form>
        <form action="./modificar.php">
            <input type="submit" value="Modificar">
        </form>
        
        </div>
        </section>
    
    </main>
    <footer class="footer" >
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ducimus laudantium eligendi nobis repudiandae deleniti pariatur maxime veniam, odio eos mollitia ipsa et nisi consequuntur id molestiae! Autem, minima distinctio.</p>
    </footer>

    
	
	<?php
	if(isset($_POST['enviar'])){
		$nombre=$_POST['txtNombre'];
		$edad=$_POST['txtEdad'];
		$diaNac=$_POST['txtDiaNac'];
		$mesNac=$_POST['cmbMesNac'];
		$anioNac=$_POST['txtAnioNac'];
		$sexo=$_POST['opbSexo'];

		$separar=explode('-', $mesNac);
		$fechaNac=$separar[1]. "" . $diaNac . " ," . $anioNac; 

		$doc=new domDocument("1.0","utf-8");
		$doc->formatOutput=true;
		$doc->load("datos.xml");
		$raiz=$doc->getElementsByTagName("usuarios")->item(0);

		$rama=$doc->createElement('usuario');
		$hoja=$doc->createElement('nombre');
		$hoja->setAttribute('sexo',$sexo);
		$hoja->appendChild($doc->createTextNode($nombre));
		$rama->appendChild($hoja);

		$hoja=$doc->createElement('edad');
		$hoja->appendChild($doc->createTextNode($edad));
		$rama->appendChild($hoja);

		$hoja=$doc->createElement('fecha-de-nacimiento');
		$hoja->setAttribute('m',$separar[0]);
		$hoja->setAttribute('d',$diaNac);
		$hoja->setAttribute('a',$anioNac);
		$hoja->appendChild($doc->createTextNode($fechaNac));
		$rama->appendChild($hoja);

		$raiz->appendChild($rama);
		$doc->appendChild($raiz);
		$doc->save("datos.xml");

    
	}
	?>
</body>
</html>
