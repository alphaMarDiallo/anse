<?php
// J'effectue mon code de déconnection
if (isset($_GET['action']) && $_GET['action'] == 'disconnect') {
    session_destroy();//je détruit la SESSION du membre
    redirect("index.php"); // et je le renvoie sur la page d'accueil
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <!-- Lien fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <!-- Lien CDN bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--BS PICKERDATE -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
    <!-- Lien CSS personel -->
    <link rel="stylesheet" href="<?= URL ?>/lib/css/style.css">
    <!-- Lien CSS personel -->
    <link rel="stylesheet" href="<?= URL ?>lib/css/admin-style.css">

</head>

<body>
    <div class="container">
        <header class="row">
            <!-- NavbarPrimaire -->
            <nav class="navbar navbar-expand-lg navbar-light col-md-12 mt-4">
                <div class="col-md-2 text-center logo" id="border">
                    <a href="index.php"><img src="lib/img/logoFavIconAlpha.png" alt="logo préhypno"></a>
                    <p>Anne-Cécile<br>ROUGIER</p>
                    <!-- + -->
                </div>
                <div class="col-md-4 text-center" id="border">
                    <address><i class="fas fa-map-marker-alt mt-2"></i>&nbsp 23 rue de la folie Méricourt<br> 75011
                        Paris </address>
                    <button class="bouton_vert mx-auto badge-pill telephone">
                        <i class="fas fa-phone"></i>
                        &nbsp 07 01 02 03 01
                    </button>
                </div>
                <div class="col-md-4 text-center" id="border">
                    <h1 class=" accueil">Hypno-Thérapeute-Humaniste</h1>
                    <a href="rdv.php">
                        <button class="bouton_vert  mt-1 badge-pill" target="_blank">
                            <i class="fas fa-clock"></i> Prendre un RDV
                        </button>
                    </a>
                </div>
                <div class="col-md-2 text-center">
                    <div>
                        <!-- Avec la superglobal $_SESSION, on cherche à savoir si un membre est connecté. Si il est connecté alors le bouton de déconnexion apparait -->
                        <?php if (isset($_SESSION['members'])) { ?>
                        <a href="?action=disconnect">
                            <button class="bouton_vert badge-pill mt-5">
                                <i class="fas fa-clock"></i> Déconexion
                            </button>
                        </a>
                        <?php } else { ?>
                        <!-- Si il n'y a pas de SESSION on laisse le bouton Inscription/<br>Connexion-->
                        <a href="connexion.php">
                            <button class="bouton_vert badge-pill mt-5">
                                <i class="fas fa-clock"></i> Inscription/<br>Connexion
                            </button>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </nav><!-- fin #navbarPrimaire -->
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-inverse navbar-lg navbar-fixed-bottom navbar-light logo mt-3"
                        id="navbarSecondaire">

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse text-align-center" id="navbarNav">
                            <ul class="navbar-nav mt-4">
                                <div class="row">
                                    <li class="nav-item active ml-2">
                                        <a class="nav-link " href="qui.php">
                                            <span class="border border-light rounded-pill btn hover">L'hypnose pour qui
                                                ?</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active ml-2">
                                        <a class="nav-link" href="seance.php">
                                            <span class="border border-light rounded-pill btn hover">Déroulé d'une
                                                séance</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ml-2">
                                        <a class="nav-link" href="articles.php">
                                            <span class="border border-light rounded-pill btn hover">Articles</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ml-2">
                                        <a class="nav-link" href="prez.php">
                                            <span class="border border-light rounded-pill btn hover">Anne-Cecile
                                                ROUGIER</span>
                                        </a>
                                    </li>
                                </div>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <hr></a>
        <main class="row">