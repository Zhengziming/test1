<?php
/**
 * Class Controler
 * Gère les requêtes HTTP
 * 
 * @author Jonathan Martel
 * @version 1.0
 * @update 2019-01-21
 * @license Creative Commons BY-NC 3.0 (Licence Creative Commons Attribution - Pas d’utilisation commerciale 3.0 non transposé)
 * @license http://creativecommons.org/licenses/by-nc/3.0/deed.fr
 * 
 */

class Controler 
{
	
		/**
		 * Traite la requête
		 * @return void
		 */
		public function gerer()
		{
			
			switch ($_GET['requete']) {
				case 'listeBouteille':
					$this->listeBouteille();
					break;
				case 'autocompleteBouteille':
					$this->autocompleteBouteille();
					break;
				case 'ajouterNouvelleBouteilleCellier':
					$this->ajouterNouvelleBouteilleCellier();
					break;
				case 'ajouterBouteilleCellier':
					$this->ajouterBouteilleCellier();
					break;
				case 'ModificationFormulaire':
					$this->FormModif();
					break;
				case 'ModifBouteille':
					$this->ModifBouteille();
					break;
				case 'boireBouteilleCellier':
					$this->boireBouteilleCellier();
					break;
				case 'FormSignup':
					$this->FormSignup();
					
					break;
				case 'FormLogin':
					$this->FormLogin();
					
					break;
				case 'FormModifyAccount':
					$this->FormModifyAccount();
					
					break;
				case 'signup':
					$this->signup($_GET['username'],$_GET['password']);
					break;
				case 'login':
					$this->login($_GET['username'],$_GET['password']);
					break;
				case 'updateUser':
					$this->updateUser($_GET['username'],$_GET['password']);
					break;
				case "Logout":
					$this->Logout();
					$this->accueil();
					break;
				default:
					$this->accueil();
					break;
			}
		}

		private function accueil()
		{
			$bte = new Bouteille();
            $data = $bte->getListeBouteilleCellier();
			include("vues/entete.php");
			include("vues/cellier.php");
			include("vues/pied.php");
                  
		}
		

		private function listeBouteille()
		{
			$bte = new Bouteille();
            $cellier = $bte->getListeBouteilleCellier();
            
            echo json_encode($cellier);
                  
		}
		
		private function autocompleteBouteille()
		{
			$bte = new Bouteille();
			//var_dump(file_get_contents('php://input'));
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
            $listeBouteille = $bte->autocomplete($body->nom);
            
            echo json_encode($listeBouteille);
                  
		}

		private function FormModif()
		{		
			$bte = new Bouteille();
			$infos = $bte->bouteilleParId($_GET['Id']);
			include("vues/entete.php");
			include("vues/modif.php");
			include("vues/pied.php");		
            
		}

		private function ajouterNouvelleBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			//var_dump($body);
			if(!empty($body)){
				$bte = new Bouteille();
				//var_dump($_POST['data']);
				
				//var_dump($data);
				$resultat = $bte->ajouterBouteilleCellier($body);
				echo json_encode($resultat);
			}
			else{
				include("vues/entete.php");
				include("vues/ajouter.php");
				include("vues/pied.php");
			}
			 
		}

		private function boireBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, -1);
			echo json_encode($resultat);
		}

		private function ajouterBouteilleCellier()
		{
			$body = json_decode(file_get_contents('php://input'));
			$bte = new Bouteille();
			$resultat = $bte->modifierQuantiteBouteilleCellier($body->id, 1);
			echo json_encode($resultat);
		}

		private function ModifBouteille()
		{
			$bte = new Bouteille();
			$resultat = $bte->ModifBouteille($_GET);

			/*if (isset($erreur)) {
				$this->FormModif();
			}
			else{*/
				$this->accueil();
			//}
			
		}

        private function FormSignup()
        {/*
            //le paramètre data est utilisé directement dans les vues
            $cheminVue = RACINE . "vues/" . $nomVue . ".php";
            
            if(file_exists($cheminVue))
            {
                include_once($cheminVue);    
            }   
            else
            {
                trigger_error("La vue spécifiée est introuvable.");
            }*/
			include("vues/entete.php");
			include("vues/FormSignup.php");
			include("vues/pied.php");
        }		
		private function signup($username,$password)
		{
            $u = new User();
			$resultat = $u->getUserByUsername($username);
            
            if(!$resultat){
                $res = $u->insertUser($username,$password);
                if($res){
                    echo json_encode('Signup Success!');
                }else{
                     echo json_encode($res);
                }
            }else
            {
                echo json_encode('Username already Signup');
            }
            //$resultat = $u->getAllUser();
            
			//echo json_encode($resultat);
            /*
			echo 'signup' . $username . ' ' . $password;
			if(trim($username) != "" && trim($password) != "")
			{
				 $passwordEncrypte = password_hash($password, PASSWORD_DEFAULT);
				//insérer dans la BD
				//InsertUser($_POST["username"],$passwordEncrypte);
				echo $passwordEncrypte;
			}
			else
			{
				echo 'Signup error';
			}*/
		}

        private function FormLogin()
        {
			include("vues/entete.php");
			include("vues/FormLogin.php");
			include("vues/pied.php");
        }

        private function FormModifyAccount()
        {
			include("vues/entete.php");
			include("vues/FormModifyAccount.php");
			include("vues/pied.php");
        }		
		
		private function login($username,$password)
		{
			$u = new User();
			$resultat = $u->getUserByUsername($username);
            
            if(!$resultat){
    
                echo json_encode('Username pas correct!');

            }else
            {
				if($resultat['password'] != $password){
					echo json_encode('Password pas correct!');
				}else{
					$_SESSION["UserID"] =$username;
					echo json_encode('true');
				}
            }
		}
		
		private function updateUser($username,$password)
		{
			$u = new User();
			$resultat = $u->updateUser($username,$password);
            
            if(!$resultat){
    
                echo json_encode('Username pas correct!');
				  

            }else
            {

					
				echo json_encode('true');
			
            }
			
			
		}
		
		private function Logout(){
			// Détruit toutes les variables de session
			$_SESSION = array();

			// Si vous voulez détruire complètement la session, effacez également
			// le cookie de session.
			// Note : cela détruira la session et pas seulement les données de session !
			if (ini_get("session.use_cookies")) {
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,
					$params["path"], $params["domain"],
					$params["secure"], $params["httponly"]
				);
			}

			// Finalement, on détruit la session.
		//	session_destroy();
			
			
		}
		
}
?>















