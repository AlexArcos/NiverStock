<?php  
$archivo = fopen('archivo.txt','r');

while(!feof($archivo)){
	$linea = fgets($archivo);
	echo $linea ."<br>";
}

fclose($archivo);


$nuevaLinea = "Linea nueva número ";
$archivo = fopen('archivo.txt','a');

for($i=0;$i<=10;$i++){
	fputs($archivo,"\n");
	fputs($archivo,$nuevaLinea.$i."\n");
}

fclose($archivo);
?>