        <?php       session_start();
    
        include('header.php');
	
        echo ' 
            <div class="row-fluid ">

                     <h5 class="span2" style="border-style: inset;border-radius: 20px; background-color: #BDB76B ;font-family: Time  New Roman;"> Vous etes ici : </h5> 
                    
                    <h5 class="span2" style="border-style: inset;border-radius: 20px; background-color: #BDB76B ;font-family: Time  New Roman;"> Temp&eacuterature </h5>
                    
                    <h5 class="span2 offset3" style="margin-top:5px;border-style: inset;border-radius: 20px;font-family: Time  New Roman;font-size: larger; background-color: #BDB76B ;">
                        
                        <a href="deconnexion.php"> D&eacuteconnexion </a>

                    </h5>           
                    <h5 class="span2" style="border-style: inset;border-radius: 20px; background-color: #BDB76B ;font-family: Time  New Roman;"> Utilisateur connect&eacute : '.$_SESSION['utilisateur'].' </h5>

            </div>
            
                <div class="row-fluid" >  
                    <article class="span2" style="border-style: inset;border-radius: 20px; background-color: #A9A9A9 ; "> 

                    
                        <div class="row-fluid" style="border-style: inset;border-radius: 20px">
                            <ul class="nav nav-list nav-pills nav-stacked">
                                <li>
                                    <a class="btn btn-large" href="accueil.php">Accueil</a>
                                </li>

                                <li>
                                    <a class="btn btn-large" href="temperature.php">Temp&eacuterature</a>
                                </li>

                                <li>
                                    <a class="btn btn-large" href="oxygene.php">Oxyg&egravene dissous</a>
                                </li>

                                <li>
                                    <a class="btn btn-large" href="conductivite.php">Conductivit&eacute</a>
                                </li>

                                <li>
                                    <a class="btn btn-large" href="ph.php">pH</a>
                                </li>

                            </ul>
                        </div>

                    

                    </article>


                <section class="span10 " id="contenu1">'; 
                    
                     include("connexpdo.inc.php");
                    //Connexion à la base de données
                     
                    if($idcom=connexpdo("ur_abaq","myparam")){

                    //Requête SQL
                    $requete="SELECT * FROM oxygene";
                    $result=$idcom->query($requete);

                    if(!$result) {
                        $mes_erreur=$idcom->errorInfo();
                        echo "Lecture impossible, code", $idcom->errorCode(),$mes_erreur[2];
                        } 
                    else {
                            
                          echo'<table id="tab" class="records_list table table-striped table-hover tableau1 hero-unit" align="center">
                          <thead>
                          <tr>
                            <th>#</th>
                            <th>Oxyg&egravene</th>
                            <th>Variation</th>
                            <th>Date</th>
                            <th>Seuil</th>
                          </tr>
                          </thead>
                          <tbody>';
                            echo'<tr>';
                              while ($row = $result->fetch(PDO::FETCH_NUM)){
                                foreach($row as $donn) { 
                                echo'<td>', $donn, '</td>';
                                
                                }
                            echo'</tr>';
                              }
                           echo'</tbody>';
                           echo'</table>'; 
                         }  
                    
                    $result->closeCursor(); 
               	    $requete=null;
		    $idcom=null;   
                    }         
                    
                else{
                     echo'<script type=\"text/javascript\">alert("Impossible de se connecter au serveur");
                     window.location="accueil.php";</script>';
                    }
                    
                echo'</section>

        </div>';

        include('footer.php');
            ?>
