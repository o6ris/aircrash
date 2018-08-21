<?php 

namespace AirCrash\Models;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;


class UserModel
{


    public function signIn($sEmail, $sPassword)
    {
        $oBdd = new Connect();
        
        $aUser = $oBdd->queryOne(
            'SELECT `Id`, `FirstName`, `LastName`, `Password`, `Email` 
                FROM User WHERE Email=?', [$sEmail]
        );
        
        return false;
    }
}
