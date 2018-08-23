<?php

namespace AirCrash\Controllers;

use Silex\Application;
use AirCrash\Models\AirportModel;


class DisplayFlight
{

	public function search(Application $app)
	{
		
		return $app['twig']->render('display_flights.twig');
	}
}