<?php       session_start();

include('header.php');

echo '
            <div class="row-fluid ">

                <div class="navbar-inner" style="margin-bottom: 10px">

                    <h4 class="span2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Vous &ecirctes ici : </h4>

                    <h4 class="span2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Accueil </h4>

                    <h4 class="span4 offset2" style="border-style: inset;border-radius: 20px; background-color: #f5f5f5 ;font-family: Time  New Roman;"> Utilisateur connect&eacute : ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' </h4>

                    <h4 class="span2" style="font-family: Time  New Roman;font-size: larger;">

                        <a class="btn btn-primary" href="deconnexion.php"> D&eacuteconnexion </a>

                    </h4>

                </div>
            </div>

                <div class="row-fluid" >
                    <article class="span2" style="border-style: inset;border-radius: 20px; background-color: #A9A9A9 ; ">


                        <div class="row-fluid" style=" margin-left: 7px;margin-top: 10px;font-family: Time New Roman">
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
                            <table id="tab" class="table table-bordered" align="center">
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
                    
                    <div class="row-fluid well span6 offset3" style="background-color: #A9A9A9;">
                            <div id="myCarousel" class="carousel slide">
                              <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                                <li data-target="#myCarousel" data-slide-to="3"></li>
                                <li data-target="#myCarousel" data-slide-to="4"></li>
                                <li data-target="#myCarousel" data-slide-to="5"></li>
                                <li data-target="#myCarousel" data-slide-to="6"></li>
                                <li data-target="#myCarousel" data-slide-to="7"></li>
                                <li data-target="#myCarousel" data-slide-to="8"></li>
                                <li data-target="#myCarousel" data-slide-to="9"></li>
                              </ol>
                              <!-- Carousel items -->
                              <div class="carousel-inner">
                                <div class="active item"> <img src="img/silure1.jpg"/></div>
                                <div class="item"> <img src="img/silure2.jpg"/> </div>
                                <div class="item"> <img src="img/silure3.jpg"/> </div>
                                <div class="item"> <img src="img/silure4.jpg"/> </div>
                                <div class="item"> <img src="img/silure5.jpg"/> </div>
                                <div class="item"> <img src="img/tilapia1.jpg"/> </div>
                                <div class="item"> <img src="img/tilapia2.jpg"/> </div>
                                <div class="item"> <img src="img/tilapia3.jpg"/> </div>
                                <div class="item"> <img src="img/tilapia4.jpg"/> </div>
                                <div class="item"> <img src="img/tilapia5.jpg"/> </div>
                              </div>
                              <!-- Carousel nav -->
                              <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                              <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                            </div>
                    </div>
                         
                    
                </section>

        </div>
';
        include('footer.php');
            ?>
