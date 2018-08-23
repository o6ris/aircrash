<?php

namespace AirCrash\Models;


use Silex\Application;
// parce que $app['db'] est un objet provenant de cette classe
use Doctrine\DBAL\Connection; 

class AirportModel
{
	public function searchFlight(Application $app)
	{

		$sql = "SELECT `id`, `name`, `city`, `country` FROM airport ORDER BY name ASC";
		return $app['db']->fetchAll($sql);
	}

	// public function displayFlight(Application $app)
	// {
	// 	$sql = "SELECT * FROM `flight` WHERE "
	// }
}