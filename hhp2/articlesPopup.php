<?php
require_once "inc/init.inc.php";
//variable d'affichage :
$contenu = "";
// On verifie si 'idArticle' existe bien si oui on prepare une requete de selection 
if (isset($_GET['action']) && $_GET['action'] === 'read' && isset($_GET['id'])) {   // requete prepare de selection  qui permet de securisé les requetes
    $resultat = $pdo->prepare("SELECT * FROM articles WHERE idArticle = :idArticle");
    $resultat->bindValue(':idArticle', $_GET['id'], PDO::PARAM_STR);
    $resultat->execute();
    //    Boucle qui retourne le resultat de la variable $article  
    while ($article = $resultat->fetch(PDO::FETCH_ASSOC)) {
        // On  affiche la card via la variable contenu
        $contenu .= '<div class="card m-5 col-md-12  style="width: 18rem;">';
        $contenu .= '<div class="card-body">';
        $contenu .=  '<h5 class="card-title">' . $article['titleArticle'] . '</h5>';
        $contenu .=  '<p class="card-text text-justify">' . $article['article'] . '</p>';
        $contenu .=  '<a href="' . $article['link'] . 'target="_blank" class="btn btn-outline-info">Source</a>';
        $contenu .= '</div>';
        $contenu .= '</div>';
    }
}
require_once 'inc/header2.inc.php';
?>
<section class="container">
    <div class="row">
        <?php echo $contenu; ?>
    </div>
</div><!--  Fin row -->
</section>
<?php 
require_once 'inc/footer.inc.php';
?>