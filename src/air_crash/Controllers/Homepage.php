<?php
namespace AirCrash\Controllers;

use Silex\Application;
use AirCrash\Models\AirportModel;

class Homepage
{
	public function showPage(Application $app)
    {

    	$oAirportModel = new AirportModel();
    	$airports = $oAirportModel->displayFlight($app);
    	var_dump($airports);
        return $app['twig']->render('home.twig');
    }


}



