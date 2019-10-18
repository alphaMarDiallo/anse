<?php
// J'empêche l'acces au parties administrateur aux internautes qui n'ont pas le bon statut
if (!isset($_SESSION['members']) && ($_SESSION['status'] != 1)) {
    header("location: ../index.php");
}
//Code de déconnection
if (isset($_GET['action']) && $_GET['action'] == 'disconnect') {
    session_destroy();
    redirect("../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Administrateur</title>
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CDN ADMIN -->
    <link rel="stylesheet" href="../lib/css/admin-style.css" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminAccueil.php">Accueil Administrateur <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gestionPatients.php">Gestion des Patients</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="GestionArticles.php" tabindex="-1" aria-disabled="true">Gestion des
                            Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="GestionQuestions.php" tabindex="-1" aria-disabled="true">Gestion des
                            Questions</a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-outline-danger" href="?action=disconnect">Deconnexion</a>
        </nav>
    </div>
    <?php
    require_once "adminFooter.inc.php";
    ?>