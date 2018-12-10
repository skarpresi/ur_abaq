
<?php
      function connexpdo($base,$param){
         include_once($param.".inc.php");
		 $dsn="mysql:host=".MYHOST.";dbname=".$base;
		 $user=MYUSER;
		 $pass=MYPASS;
		 try{
		      $idcom=new PDO($dsn,$user,$pass);
			  return $idcom;
			 }
		 catch(PDOException $except){
		     echo "Echec de la connexion", $except->getMessage();
			 return FULSE; exit();
			                         }
									   }

       // fonction de deconnexion
	// ecrasement des session dans un tableau
	// destruction du tableau
	// 		Si une page de redirection est choisi
	//			redirection vers la page
	 function deconnexion() {
         //Suppression des variables de sessions
         $_SESSION = array();
         session_destroy();

         // Suppression des cookies de connexion automatique
         // setcookie('login', '');
         // setcookie('password', '');
         echo "<script type=\"text/javascript\">alert('Vous etes maintenant deconnectes');
	     window.location='index.html';</script>";
         die();
	}                                                               
?>									   
