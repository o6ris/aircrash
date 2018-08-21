<?php
namespace AirCrash\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;


class Contact
{
	public function showForm(Application $app)
    {
        return $app['twig']->render('contact.twig');
    }

    public function submitForm(Request $request, Application $app)
    {
        return $app['twig']->render(
            'contact.twig', 
            [ 
            	'firstname' => $request->get('firstname'), 
            	'lastname' => $request->get('lastname') 
            ]
        );
    }
}

