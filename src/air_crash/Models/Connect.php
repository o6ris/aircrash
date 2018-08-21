<?php 
namespace AirCrash\Models;

use Symfony\Component\HttpFoundation\Request;
use Silex\Application;
use PDO;

class Connect 
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new PDO(
		'mysql:host=localhost;dbname=AirCrash',
		'root',
		'troiswa',
		[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
		);
	}

	public function executeSql($sql, array $values = array())
	{
		$query = $this->bdd->prepare($sql);

		$query->execute($values);

		return $this->bdd->lastInsertId();
	}

	public function query($sql, array $criteria = array())
    {
        $query = $this->bdd->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, array $criteria = array())
    {
        $query = $this->bdd->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}	
