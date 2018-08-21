<?php
namespace AirCrash\Controllers;

use Silex\Application;


class Homepage
{
	public function showPage(Application $app)
    {
        return $app['twig']->render('home.twig');
    }
}



