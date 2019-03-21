<?php
	require_once '../XML/KML/Create.php';
	$kml = new XML_KML_Create;
	
	    // assumes you have $kml setup
	$foldername = "Places";

	$place = $kml->createPlace();

	$place->setId('1')
		->setName('Tour Divide')
		->setDesc('Start of the Tour Divide')
		->setFolder($foldername)
		->setCoords(-115.56016,51.161267);

	$kml->addItem($place);

	$place = null;

	file_put_contents('output.kml', $kml);
	
?>	