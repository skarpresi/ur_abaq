<?php 

// La classe de cryptage
class Cryptage {
	
	// Fonction de cryptage
	public static function crypter($var) {
		$sel = "48@tiOP";
		$Cript = md5($var);
		$crypt = sha1($Cript, $sel);
		return $crypt;
	}
	// creation d'une chaine aleatoire
	public static function chaine($nb_car, $chaine='AZERTYUIOPQSDFGHJKLMWXCVBNazertyuiopqsdfghjklmwxcvbn123456789') {
		$nb_lettres = strlen($chaine)-1;
		$generation = '';
		for($i=0; $i < $nb_car; $i++)
		{
			$pos = mt_rand(0, $nb_lettres);
			$car = $chaine[$pos];
			$generation .= $car;
		}
		return $generation;
	}
	
} // Fin de la classe de cryptage

###########################################################################################

// La classe Message
class Message {
	
	// nombre de nouveau message du membre connecte
	public static function nouveauNb($id) {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MESSAGE.NBNEW);
		$resultat -> bindParam(':id', $id, PDO::PARAM_INT, 11);
		$resultat -> execute();
		if($resultat -> rowCount() === 0) {
			return 'Vous n\'avez aucun nouveau message';
		}
		else {
			return 'Vous avez '.$resultat -> rowCount().' nouveau(x) message(s).';
		}
	}
	
	// envoie d'un message
	// Si le destinataire et ok
	//		Si le titre est ok
	//			Si le message est ok
	//				Si le message et le titre ne contiennent pas des mots interdits
	//					Nettoyage du message et du titre
	//					Enregistrement dans la bdd
	//					retourne Vrai
	//				Sinon
	//					retourne une erreur
	//			Sinon
	//				retourne une erreur
	//		Sinon
	//			retourne une erreur
	// Sinon
	//  	retourne une erreur
	public static function messageEnvoi($id_exp, $destinataire, $titre, $message) {
		if(!empty($destinataire)) {
			if(!empty($titre)) {
				if(!empty($message)) {
					if(Message::interdit($message)) {
						$message = nl2br(filter_var($message, FILTER_SANITIZE_STRING));
						$titre = filter_var($titre, FILTER_SANITIZE_STRING);
						$date = time();
						$resultat = Bdd::connectBdd()->prepare(INSERT.MESSAGEZ.MESSAGEINSERT);
						$resultat -> bindParam(':id_exp', $id_exp, PDO::PARAM_INT, 11);
						$resultat -> bindParam(':id_dest', $destinataire, PDO::PARAM_INT, 11);
						$resultat -> bindParam(':titre', $titre);
						$resultat -> bindParam(':date', $date);
						$resultat -> bindParam(':message', $message);
						$resultat -> execute();
						return 'Votre message est envoy&eacute;';
					}
					else {
						return '<span-class="error-info">Votre message ou votre titre contient du language SMS ou des mots interdits, veuillez recommencer.</span>'.$message;
					}
				}
				else {
					return '<span-class="error-info">Vous devez saisir un message.</span>';
				}
			}
			else {
				return '<span-class="error-info">Vous devez saisir un titre au message.</span>';
			}
		}
		else {
			return '<span-class="error-info">Vous devez choisir un destinataire.</span>';
		}
	}
	
} // Fin de la classe message

###########################################################################################

// La classe Info sur le site
class InfoApp {
	
	// Nombre d'utilisateurs
	public static function userNb() {
		$resultat = Bdd::connectBdd()->prepare(SELECT.ALL.MEMBRE);
		$resultat -> execute();
		if($resultat -> rowCount() === 0) {
			return 'Il y a aucun membre inscrit';
		}
		else {
			return 'Il y a '.$resultat -> rowCount().' membres inscrits';
		}
	}
	
	
} // Fin de la classe Info sur le site

###########################################################################################

?>
