<?php

exit();
// Nombre de vols que nous souhaitons créer
$iNbFlights = 20000;

// Connexion à la base de données
$oPdo = new PDO('mysql:host=localhost;dbname=AirCrash','root','troiswa');

// On sélectionne les avions disponibles
$aPlanes = $oPdo->query('SELECT id FROM plane')->fetchAll(PDO::FETCH_ASSOC);


// On sélectionne les aeroports disponibles
$aAirport = $oPdo->query('SELECT id FROM airport')->fetchAll(PDO::FETCH_ASSOC);

// Preparation de la requete INSERT
$sSqlInsert = 'INSERT INTO flight (departureTime, 	departureDate, arrivalTime, arrivalDate, departureAirport_id, arrivalAirport_id, plane_id, price) VALUES (?,?,?,?,?,?,?,?)';
$query = $oPdo->prepare($sSqlInsert);


// On boucle pour créer les différents vols
for($i = 0; $i < $iNbFlights; $i++) {

	// création des horaires de vol
	$randomDateDepart = mt_rand(1535027667, 1547035667);
	$time = mt_rand(8000, 60000); // durée du vol
	// On détermine une date (et heure d'arrivée)
	$randomDateArrivee = $randomDateDepart+$time;

	// Les dates
	$dateDepart = date('Y-m-d H:i:s', $randomDateDepart);
	$dateArrivee = date('Y-m-d H:i:s', $randomDateArrivee);

	// Aeroport de départ
	$keyAeroportDepart = array_rand($aAirport);

	// Aeroport d'arrivée (on en prend 2 pour assurer de ne pas
	// avoir un aeroport de depart equivalent a l'aeroport d'arrivée)
	$keyAeroportArrivee = array_rand($aAirport,2);

	// On récupére la 1ere clef si elle est differente 
	// de l'aeroport de depart sinon on prend la 2eme clef
	$keyAeroportArrivee = ( $keyAeroportDepart != $keyAeroportArrivee[0] 
		? $keyAeroportArrivee[0] 
		: $keyAeroportArrivee[1] 
	);

	// Choix de l'avion
	$keyAirplane = array_rand($aPlanes);

	// Pour avoir des prix aleatoire basé sur la durée du trajet 
	// arrondi à 2 chiffres après la virgule
	$price = round($time/mt_rand(80, 100),2);

	// On insére en BDD
	$query->execute([
		$dateDepart,
		$dateDepart,
		$dateArrivee,
		$dateArrivee,
		$aAirport[$keyAeroportDepart]['id'],
		$aAirport[$keyAeroportDepart]['id'],
		$aPlanes[$keyAirplane]['id'],
		$price
	]);
}

exit();
$handle = fopen("avions.csv", "r+");
$oPdo = new PDO('mysql:host=localhost;dbname=AirCrash', 'root', 'troiswa', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

// var_dump($colsOfLine = fgetcsv($handle, 0, ';');

while(($colsOfLine = fgetcsv($handle, 0, ';')) != false)
{
	$query = $oPdo->prepare('INSERT INTO plane (name,numberOfSeats) VALUES(?,?)');
	$query->execute([$colsOfLine[0],$colsOfLine[2]]);

	// var_dump([$colsOfLine[0],$colsOfLine[2]]);

}

fclose($handle);