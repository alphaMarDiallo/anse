<?php
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";
$contenu = "";
// AFFICHAGE DES 3 DERNIERS ARTICLES
$resultat = $pdo->prepare("SELECT * FROM articles ORDER BY dateArt DESC LIMIT 3");
$resultat->execute();
while ($articles = $resultat->fetch(PDO::FETCH_ASSOC)) :
    $contenu .= '<div class="card text-center col-md-3 mb-5">';
    $contenu .= '<div class="card-header">';
    $contenu .= '<h5>' . $articles['titleArticle'] . '</h5>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text class="card-text">' . substr($articles['article'], 0, 100) . '...</p>';
    // la fonction subtr(variable,0,100) me permet d'afficher que les 100 premiers caractère de mon texte. le 0 représente le premier caractère qui s'affiche et 100 le dernier caractère affiché
    $contenu .= '<a href="#">' . 'Paru le ' . $articles['dateArt'] . '</a>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-footer text-muted">';
    $contenu .= '<a class="btn bouton_vert article badge-2x badge-pill" type="button" href="articlesPopup.php?action=read&id=' . $articles['idArticle'] . '" aria-expanded="false" onclick="window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=600,width=600\'); return false;" aria-controls="collapseExample1">Lire Plus</a>';
    $contenu .= '</div>';
    $contenu .= '</div>';
endwhile;
?>
<div class="row">
    <div class="row mx-auto" id="event">
        <!-- début row de la div evenement -->
        <!-- Card -->
        <div class="card card-cascade wider reverse">
            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">
                <!-- Title -->
                <h4 class="card-title"><strong>Evenements</strong></h4>
                <!-- Text -->
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem
                    perspiciatis
                    voluptatum a, quo nobis, non commodi quia repellendus sequi nulla voluptatem dicta reprehenderit,
                    placeat laborum ut beatae ullam suscipit veniam.
                </p>
            </div>
        </div>
    </div>
    <!-- Card -->
</div> <!-- fin row de la div evenement -->
<!-- <div class="col-md-12"> -->
<div class="row mx-auto">
    <!-- PP de la Thérapeute -->
    <div class="col-xs-3 col-sm-3 col-md-6 col-lg-3 mt-4">
        <a href="prez.php?page=prez" title="qui suis-je ?"><img src="lib/img/pp.png" class="rounded-circle"
                alt="photo profil"></a>
    </div><!-- Fin col-md-2 -->
    <div class="col-md-6 mx-auto mt-5">
        <!-- Titre -->
        <h2 class="mt-2 mb-5">Qu'est-ce que l'hypnose ?</h2>
        <!-- Premier paragraphe -->
        <p>Avez-vous déjà eu un problème de stress ou avez-vous déjà voulu arrêter de fumer, mais vous avez toujours
            échoué?</p>
        <p>Et si vous me laissiez vous aider</p>
        <p class="offset-8 signature"> Anne-Cécile ROUGIER <br> Hypno-thérapeute</p>
        <a href="hypnose.php"><button class="bouton_vert blue voir_plus ml-4 mt-1 badge-2x badge-pill">Voir
                plus</button></a>
    </div>
</div>
<!-- fin de la row pour portrait + blabla -->
<hr>
<!-- LES AVANTAGES -->
<!-- début de la row/boucle qui va afficher les trois derniers articles -->
<div id="container" class="row">
    <?= $contenu; ?>
</div>
<!-- fin de la row -->
<a class="btn bouton_vert article badge-2x badge-pill" href="articles.php">
    Lire tous les Articles
</a>


<?php require_once 'inc/footer.inc.php' ?>