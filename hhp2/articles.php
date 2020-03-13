<?php
require_once("inc/init.inc.php");
//variable d'affichage :
$contenu = "";
// J'affiche tous mes articles :
$resultat = $pdo->prepare("SELECT * FROM articles ORDER BY dateArt DESC");
$resultat->execute();
while ($articles = $resultat->fetch(PDO::FETCH_ASSOC)) :

    $contenu .= '<div class="card text-center col-md-4 mb-3 mr-2">';
    $contenu .= '<div class="card-header">';
    $contenu .= '<h5>' . $articles['titleArticle'] . '</h5>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-body text-justify">';
    $contenu .= '<p class="card-text class="card-text">' . substr($articles['article'], 0, 200) . '...</p>';
    // la fonction subtr(variable,0,100) me permet d'afficher que les 100 premiers caractère de mon texte. le 0 représente le premier caractère qui s'affiche et 100 le dernier caractère affiché
    $contenu .= '<p>' . 'Paru le <strong>' . $articles['dateArt'] . '</strong></p>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-footer text-muted">';
    $contenu .= '<a class="btn bouton_vert article badge-2x badge-pill" type="button" href="articlesPopup.php?action=read&id=' . $articles['idArticle'] . '">Lire Plus</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';


endwhile;

require_once("inc/header.inc.php");
?>

<h3 class="col-md-12 text text-center m-5">Articles :</h3>
<div class="container">

    <!-- début de la row/boucle qui va afficher les trois derniers articles -->
    <div id="container" class="row">

        <?= $contenu; ?>

    </div>
    <!-- fin de la row -->

</div>


<?php require_once 'inc/footer.inc.php' ?>