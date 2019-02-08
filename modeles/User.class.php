<?php
/**
 * Class User
 * Cette classe possède les fonctions de gestion des usager.
 * 
 * @author Ming
 * @version 1.0
 * @update 2019-02-06
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class User extends Modele {
	const TABLE = 'usager';
    
	public function getUserByUsername($username)
	{
		$res = $this->_db->query('Select * from '. self::TABLE . ' where username="' . $username . '"');
        $row = $res->fetch_assoc();
		return $row;
	}
    
	public function insertUser($username,$password)
	{
		//TODO : Valider les données.
		//var_dump($data);	
		
		$requete = "INSERT INTO usager(username,password) VALUES (".
		"'".$username."',".
		"'".$password."')";

        $res = $this->_db->query($requete);
        
		return $res;
	}
	
	public function updateUser($username, $password)
	{
		//TODO : Valider les données.			
		$requete = "UPDATE usager SET  password='".$password."'  WHERE username='".$username."'";
		//echo $requete;
        $res = $this->_db->query($requete);
        
		return $res;
	}
    
	
  
}




?>