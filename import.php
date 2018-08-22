<?php
// exit();
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