<?php

namespace AirCrash\Models;


use Silex\Application;
// parce que $app['db'] est un objet provenant de cette classe
use Doctrine\DBAL\Connection; 

class AirportModel
{
	public function displayFlight(Application $app)
	{
		$sql = "SELECT `name`, `city`, `country` FROM airport";
		return $app['db']->fetchAll($sql);

	}
}