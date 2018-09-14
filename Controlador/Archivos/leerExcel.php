<?php  
/*$archivo = fopen('archivo.txt','r');

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

fclose($archivo);*/

$archivo = fopen('carros.csv','r');
$fila = 0;

echo "LISTADO DE CARROS <br>";
while($carro = fgetcsv($archivo,1000,';')){
	if($fila>0){
		echo "<br> Placa: ".$carro[0];
		echo "<br> Marca: ".$carro[1];
		echo "<br> Color: ".$carro[2];
		echo "<br> Estado: ".$carro[3];
	}
	$fila++;
}

fclose($archivo);
?>