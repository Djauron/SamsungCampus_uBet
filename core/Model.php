<?php
class Model
{
	protected $table;
	protected static $_pdo = null;

	function __construct()
	{
		$user = "root";
		$password = "Cloud";
		$database = "bet";
		$host = "localhost";
		if(self::$_pdo === null)
		{
			try 
			{
				self::$_pdo = new PDO("mysql:host=".$host.";dbname=".$database, $user, $password);
			}
			catch(PDOException $e)
			{
            	die('Erreur : '.$e->getMessage());
        	}
		}
	}

	public function read($id)
	{
		$sql = "SELECT * FROM ".$this->table." WHERE id=:id";
		$query = self::$_pdo->prepare($sql);
		$query->bindParam(":id", $id);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}

}

?>