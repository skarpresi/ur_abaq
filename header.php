<?php

echo '<!DOCTYPE html>
<html>
    <head>
        <meta  charset="utf-8">
        <title>
            Acceuil
        </title>
       

        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="css/jquery">
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css"/>
        <link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css"/>
        <link rel="stylesheet" type="text/css" href="css/demo_table.css"/>
        <link rel="stylesheet" type="text/css" href="css/demo_table_jui.css"/>
        <link rel="stylesheet" type="text/css" href="css/demo_page.css"/>
        <link rel="stylesheet" href="dist/themes/default/style.min.css" />
        <link rel="stylesheet" type="text/css" href="css/datepicker.css">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    </head>

        <body style="width: 100%" id="princip">



        <div class="container-fluid" id="princip">

            <div class="row-fluid" style="margin-top: 0px" id="princip">

                <header class="span12" style="margin-top: 0px;border-style: inset;border-radius: 20px"> 
                    <div class="span2" style="margin-bottom:  0px;border-style: inset;border-radius: 20px" >    
                        <img src="images/logo_unb.jpg" class="img-rounded" id="logo">
                    </div>
                    <div class="span8 " id="entete" style="margin-top: 5px;border-style: inset;border-radius: 20px;margin-bottom:  5px;">
                        <h2 style="font-family: Time New Roman;"> Laboratoire d\'Etudes et de Recherches des Ressources Naturelles et des Sciences de l\'Environnement (LERNSE) </h2>
                        <h3 style="font-family: Time New Roman;"> <center> Unit&eacute de Recherches en Aquaculture et Biodiversit&eacute Aquatique (UR-ABAQ) </center> </h3>

                    </div>
                    <div class="span2 " id="entete" style="border-style: inset;border-radius: 20px">
                        
                            
                        <img src="images/logo_unb.jpg" class="img-rounded" id="logo" style="margin-bottom:  0px;border-style: inset;border-radius: 20px">
                        
                    </div>
                    
                </header>
            </div>

            <div class="row-fluid " align="center" style="margin-top: 10px;border-style: inset;border-radius: 20px;font-family: Time New Roman;">
                

                    <div class="well navbar-inner bandeau " >
                        <div class="btn-group">      
                            <a class="btn" href="accueil.php"><i class="icon-home icon-black"></i>Accueil</a>
                        </div>

                        <div class="btn-group">      
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                <a href="#">Temp&eacuterature</a>
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu">
                               <li><a href="temperature.php"> Liste </a></li>
                               <li class="divider"></li>
                               <li><a href="#"> Variation</a></li>
                            </ul>
                        </div>

                        <div class="btn-group">      
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                <a href="#">Oxyg&egravene dissous</a>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                               <li><a href="oxygene.php"> Liste </a></li>
                               <li class="divider"></li>
                               <li><a href="#"> Variation</a></li>
                            </ul
                            </div>


                        <div class="btn-group">      
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                <a href="#"> Conductivit&eacute</a>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                               <li><a href="conductivite.php"> Liste </a></li>
                               <li class="divider"></li>
                               <li><a href="#"> Variation</a></li>
                            </ul>
                            </div>
                        
                        <div class="btn-group">      
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                <a href="ph.php"> pH</a>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                               <li><a href="ph.php"> Liste </a></li>
                               <li class="divider"></li>
                               <li><a href="#"> Variation</a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">      
                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                <a href="#">A propos</a>
                                <span class="caret"></span>
                            </button>

                            <ul class="dropdown-menu">

                                <li><a href="#"><i class="icon-question-sign icon-black"></i> Concepteur </a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-question-sign icon-black"></i> Application  </a></li>
                            </ul>
                        </div>
                        
                        <div class="btn-group">      
                            <a class="btn" href="#"> <i class="icon-user icon-black"></i> Utilisateur</a>
                        </div>
                    </div>
                </div>
            
';
?>