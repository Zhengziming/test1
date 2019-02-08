<?php
/**
 * Class Bouteille
 * Cette classe possède les fonctions de gestion des bouteilles dans le cellier et des bouteilles dans le catalogue complet.
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */
class Bouteille extends Modele {
	const TABLE = 'vino__bouteille';
    
	public function getListeBouteille()
	{
		
		$rows = Array();
		$res = $this->_db->query('Select * from '. self::TABLE);
		if($res->num_rows)
		{
			while($row = $res->fetch_assoc())
			{
				$rows[] = $row;
			}
		}
		
		return $rows;
	}
	
	public function getListeBouteilleCellier()
	{
		
		$rows = Array();
		$requete ='SELECT 
			c.id as id_bouteille_cellier,
				c.id_bouteille_saq, 
				c.date_achat, 
				c.garde_jusqua, 
				c.notes, 
				c.prix, 
				c.quantite,
				c.millesime, 
				b.id,
				c.nom, 
				b.type, 
				b.image, 
				b.code_saq, 
				b.url_saq, 
				c.pays, 
				b.description,
				t.type 
					from bouteille__cellier c 
					INNER JOIN vino__saq b ON c.id_bouteille_saq = b.id
					INNER JOIN vino__type t ON t.id = b.type
						'; 
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de donnée", 1);
			 //$this->_db->error;
		}
		
		
		
		return $rows;
	}
	
	/**
	 * Cette méthode permet de retourner les résultats de recherche pour la fonction d'autocomplete de l'ajout des bouteilles dans le cellier
	 * 
	 * @param string $nom La chaine de caractère à rechercher
	 * @param integer $nb_resultat Le nombre de résultat maximal à retourner.
	 * 
	 * @throws Exception Erreur de requête sur la base de données 
	 * 
	 * @return array id et nom de la bouteille trouvée dans le catalogue
	 */
       
	public function autocomplete($nom, $nb_resultat=10)
	{
		
		$rows = Array();
		$nom = $this->_db->real_escape_string($nom);
		$nom = preg_replace("/\*/","%" , $nom);
		 
		//echo $nom;
		$requete ='SELECT id, nom FROM bouteille__cellier where LOWER(nom) like LOWER("%'. $nom .'%") LIMIT 0,'. $nb_resultat; 
		//var_dump($requete);
		if(($res = $this->_db->query($requete)) ==	 true)
		{
			if($res->num_rows)
			{
				while($row = $res->fetch_assoc())
				{
					$row['nom'] = trim(utf8_encode($row['nom']));
					$rows[] = $row;
					
				}
			}
		}
		else 
		{
			throw new Exception("Erreur de requête sur la base de données", 1);
			 
		}
		
		
		//var_dump($rows);
		return $rows;
	}
	
	
	/**
	 * Cette méthode ajoute une ou des bouteilles au cellier
	 * 
	 * @param Array $data Tableau des données représentants la bouteille.
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function ajouterBouteilleCellier($data)
	{
		//TODO : Valider les données.
		//var_dump($data);	
		
		$requete = "INSERT INTO bouteille__cellier(id_bouteille,date_achat,garde_jusqua,notes,prix,quantite,millesime) VALUES (".
		"'".$data->id_bouteille."',".
		"'".$data->date_achat."',".
		"'".$data->garde_jusqua."',".
		"'".$data->notes."',".
		"'".$data->prix."',".
		"'".$data->quantite."',".
		"'".$data->millesime."')";

        $res = $this->_db->query($requete);
        
		return $res;
	}
	
	
	/**
	 * Cette méthode change la quantité d'une bouteille en particulier dans le cellier
	 * 
	 * @param int $id id de la bouteille
	 * @param int $nombre Nombre de bouteille a ajouter ou retirer
	 * 
	 * @return Boolean Succès ou échec de l'ajout.
	 */
	public function modifierQuantiteBouteilleCellier($id, $nombre)
	{
		//TODO : Valider les données.			
		$requete = "UPDATE bouteille__cellier SET quantite = GREATEST(quantite + ". $nombre. ", 0) WHERE id = ". $id;
		//echo $requete;
        $res = $this->_db->query($requete);
        
		return $res;
	}
	/**
	 * Cette méthode met à jour une certaine bouteille qui a été modifié
	 * 
	 * @param void $data void reçoit tous les paramètres en GET du formulaire de modification
	 * 
	 * @return Boolean Succès ou échec de la modification.
	 */
	public function ModifBouteille($data)
	{
		//$erreur = "";

		//Doit refaire les validations
		/*if(strlen($data['nom'] > 40) || strlen($data['notes'] > 40) || strlen($data['pays'] > 40)){
			$erreur += "Un de vos champs contient trop de caractères<br>";
		}
		
		if(!is_numeric($data['millesime']) || !is_numeric($data['quantite']) || !is_numeric($data['prix'])){
			$erreur += "Veuillez entrez une valeur numérique dans les champs millesime/quantité et prix<br>";
		}

		//Si il y a des erreurs
		if($erreur !== ""){
			return $erreur;
		}
		else{*/
			$requete = "UPDATE bouteille__cellier
			SET
			nom = '". $data['nom'] ."',
			millesime = ". $data['millesime'] .",
			quantite = ". $data['quantite'] .",
			date_achat = '". $data['date_achat'] ."',
			garde_jusqua = '". $data['garde_jusqua'] ."',
			prix = ". $data['prix'] .",
			notes = '". $data['notes'] ."',
			pays = '". $data['pays'] ."'
			WHERE id =" .$data['id'];

			$res = $this->_db->query($requete);
			
			return $res;
		}
	

	/**
	 * Cette méthode nous donne tous les infos d'une bouteille spécifique
	 * 
	 * @param int $id est l'id de la bouteille en question
	 * 
	 * @return void le résultat de la requête
	 */
	public function bouteilleParId($id)
	{
		$requete = "SELECT * FROM `bouteille__cellier` WHERE id =". $id;
        $res = $this->_db->query($requete); 
		return $res;
	}
}




?>