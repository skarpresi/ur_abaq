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


                <section class="span10 " id="contenu1"> 
                    <div class="well">
                            <table class="table table-bordered" align="center">
                                <tr>
                                    <td><a  href="temperature.php"><img width="120" class="img-rounded " src="images/temperature.jpg"/></a></td>
                                    <td><a  href="oxygene.php"><img width="120" class="img-rounded " src="images/oxygene.jpg"/></a></td>
                                    <td><a  href="conductivite.php"><img width="120" class="img-rounded " src="images/conductivite.png"/></a></td>
                                    <td><a  href="ph.php"><img width="120" class="img-rounded " src="images/ph.png"/></a></td>
                                </tr>
                                <tr>
                                    <td><a  href="temperature.php"><h3>Temp&eacuterature</h3></a></td>
                                    <td><a  href="oxygene.php"><h3>Oxyg&egravene dissous</h3></a></td>
                                    <td><a  href="conductivite.php"><h3>Conductivit&eacute</h3></a></td>
                                    <td><a  href="ph.php"><h3>pH</h3></a></td>
                                </tr>
                            </table>
                    </div>
                    
                    <div class="well">      
                        
                        <h3 style="background-color: #8FBC8F;"> *Notification here </h3>  
                    </div>
                         
                    
                </section>

        </div>
';
        include('footer.php');
            ?>
