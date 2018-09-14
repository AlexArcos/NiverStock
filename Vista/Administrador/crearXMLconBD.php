<?php
include '../../Modelo/Conexion.php';
include '../../Modelo/Carro.php';
include '../../Modelo/DatosCarro.php';

header('Content-type: charset=utf-8');
header('Content-type: text/xml');

$objDatosCarros = new DatosCarro();

function resultadoXML($resultado,$nombreXML){
	$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><'.$nombreXML.'></'.$nombreXML.'>');

	if($resultado->rowCount() < 1){
		$xml->addChild('error','Error: No responde');
	}else{
		while($datos = $resultado->fetchObject()){
			$carro = $xml->addChild('Carro');
			foreach ($datos as $key => $value) {
				$carro->addChild($key,$value);	
			}
		}
	}

	$xml->asXML("CarrosBD.xml");
	return $xml->asXML();
}

$listaCarros = $objDatosCarros->listarCarros();

echo resultadoXML($listaCarros->datos ,'Carros');

?>