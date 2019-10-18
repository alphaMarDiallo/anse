<?php
require_once("inc/init.inc.php");
//variable d'affichage :
$contenu = "";
// J'affiche tous mes articles :
$resultat = $pdo->prepare("SELECT * FROM articles ORDER BY dateArt DESC");
$resultat->execute();
while ($articles = $resultat->fetch(PDO::FETCH_ASSOC)) :

    $contenu .= '<div class="card text-center col-md-3 mb-5 ml-1">';
    $contenu .= '<div class="card-header">';
    $contenu .= '<h5>' . $articles['titleArticle'] . '</h5>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text class="card-text">' . substr($articles['article'], 0, 100) . '...</p>';
    $contenu .= '<a href="#">' . 'Paru le ' . $articles['dateArt'] . '</a>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-footer text-muted">';
    $contenu .= '<a class="btn bouton_vert article badge-2x badge-pill" type="button" href="articlesBlog.php?action=read&id=' . $articles['idArticle'] . '" aria-expanded="false" aria-controls="collapseExample1">' . 'Lire Plus' . '</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';


endwhile;

require_once("inc/header.inc.php");
?>

<h3 class="col-md-12 text text-center mt-2">Articles :</h3>
<div class="container">

    <!-- début de la row/boucle qui va afficher les trois derniers articles -->
    <div id="container" class="row">

        <?= $contenu; ?>

    </div>
    <!-- fin de la row -->

</div>


<?php require_once 'inc/footer.inc.php' ?>