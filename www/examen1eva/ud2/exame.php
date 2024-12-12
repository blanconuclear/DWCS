<html>
<head><title>Curtocircuito 2021</title>
<link type="text/css" rel="stylesheet" href="exame.css"> 
</head>
<body>

<div id="contenedor">

<header>
<h2>Curtocircuito 2021 </h2>
</header>
<aside id="esquerda"></aside>
<aside id="dereita"></aside>
<article id="noiteCurta"></article>

<aside id="formulario">
	<form name="form1" method="GET" action="exame.php">
			<p>Buscar curta:</p>
		
			
			   <input type="text" name="palabra" size="10" maxlength="50" value="" style="width:230px"> 
			   <input type="submit" name="buscar" value="Buscar" class="busca"> <br>
			<hr>
			   <input type="submit" name="listado" value="Ver listado completo das curtas"><br>
			  <p>Ordenado: </p>
			  	  <input type="submit" name="listaPolotitulo" value="Polo título"><br>
			      <input type="submit" name="listaPoloPais" value="Decrecente polo país"><br>
			  <p>Cambios: </p>
				<input type="submit" name="cambioPortugal" value="Cambio 'Portugal' por 'Galicia'"><br>
                <input type="submit" name="franciaPrimeira" value="Francia de primeira"><br>
		</form>
	

</aside>

<article id="taboa">

<table>
<tr>
	<th>Titulo</th>
	<th>Director</th>
	<th>Duración</th>
	<th>Pais</th>

</tr>

<?php
	require("datosCurtocircuito.php");

//buscar palabra
if (isset($_GET['buscar'])) {
	buscarPalabra($curtas);
}


//Listado completo
if (isset($_GET['listado'])) {
	imprimirListado($curtas);
}

//ordenar titulo
if (isset($_GET['listaPolotitulo'])) {
	imprimirListado(ordernarTitulo($curtas));
}

//listado invero
if (isset($_GET['listaPoloPais'])) {
	imprimirListado(ordenarInverso($curtas));
}

//cambiar palabra
if (isset($_GET['cambioPortugal'])) {
	cambiarPortugalPorGalicia($curtas);
}



	?>  

</table>
	</article>
</div>
</body>
</html>

<?php
//Funciones
function imprimirListado($curtas){
	foreach ($curtas as $curta => $info) {
		$titulo=$curta;
		$director=$info[0];
		$duracion=$info[1];
		$pais=$info[2];
		

	echo "<tr>
		<td>$titulo</td>
		<td>$director</td>
		<td>$duracion</td>
		<td>$pais</td>
		
		
		
		</tr>";
	}
}


//ordenar polo titulo
function ordernarTitulo($curtas){
	//uksort($curtas,fn($a,$b)=>strcmp($a,$b));
	ksort($curtas);
	return $curtas;

}

//ordenar pais inverso
 function ordenarInverso ($curtas){
	uasort($curtas,fn($a,$b) => strcasecmp($b[2][0],$a[2][0]));
	return $curtas;
 }



 //cambiar palabra
 function cambiarPortugalPorGalicia($curtas){
	foreach ($curtas as $curta => $info) {
		$titulo=str_replace("Portugal","Galicia",$curta);
		$director=str_replace("Portugal","Galicia",$info[0]);
		$duracion=str_replace("Portugal","Galicia",$info[1]);
		$pais=str_replace("Portugal","Galicia",$info[2]);
		

	echo "<tr>
		<td>$titulo</td>
		<td>$director</td>
		<td>$duracion</td>
		<td>$pais</td>
		
		
		
		</tr>";
	}
 }

 //Buscar palabra
 function buscarPalabra($curtas){
$palabraBuscar =$_GET['palabra'];


foreach ($curtas as $curta => $info) {
	$titulo=$curta;
	$director=$info[0];
	$duracion=$info[1];
	$pais=$info[2];
	
	if (str_contains($titulo,$palabraBuscar)||
		str_contains($director,$palabraBuscar)||
		str_contains($duracion,$palabraBuscar)||
		str_contains($pais,$palabraBuscar)) {
	
echo "<tr>
	<td>$titulo</td>
	<td>$director</td>
	<td>$duracion</td>
	<td>$pais</td>
	
	
	
	</tr>";
}
 }
}

?>
