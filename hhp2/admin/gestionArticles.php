<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
extract($_GET);
//variables d'affichage
$contenu = "";
$validate = "";
// ---------------SUPPRESSION D' ARTICLE'-----------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    $article_delete = $pdo->prepare("DELETE FROM articles WHERE idArticle = :idArticle");
    $article_delete->bindValue(':idArticle', $id, PDO::PARAM_STR);
    $article_delete->execute();
    $_GET['action'] = 'affichage'; // on redirige vers l'affichage des articles
    $validate .= "<div class='alert-warning col-md-6 offset-md-3  mb-2 text-center'>l' article n° <strong>$id</strong> a bien été supprimé !</div>";
}
//------------------------- AFFICHAGE DES ARTICLES -------------------------
$resultat = $pdo->prepare("SELECT * FROM articles ORDER BY dateArt DESC");
$resultat->execute();
while ($articles = $resultat->fetch(PDO::FETCH_ASSOC)) :
    $contenu .= '<div class="card text-center col-md-3 offset-1 mb-5">';
    $contenu .= '<div class="card-header">';
    $contenu .= '<h5>' . $articles['titleArticle'] . '</h5>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-body">';
    $contenu .= '<p class="card-text class="card-text">' . substr($articles['article'], 0, 100) . '...</p>';
    $contenu .= '<a href="#" class="btn btn-outline-primary">' . $articles['link'] . '</a>';
    $contenu .= '</div>';
    $contenu .= '<div class="card-footer text-muted">';
    $contenu .= '<a href="ficheArticle.php?action=show&id=' . $articles['idArticle'] . '" <i class="far fa-eye text-info fa-2x mr-5"></i></a>';
    $contenu .= '<a href="?action=suppression&id=' . $articles['idArticle'] . '"onclick="return(confirm(\'En êtes vous certain ?\'))"><i class="fas fa-trash-alt text-danger fa-2x"></i></a>';
    $contenu .= '</div>';
    $contenu .= '</div>';
endwhile;
?>
<div class="row">
    <h3 class="text-center offset-md-5">Liste des Articles</h3>
</div>
<div class="row">
    <a href="../form/formArticle.php?action=add" type="button" class="btn btn-outline-success  mt-5 offset-md-8">Ajouter
        un nouvel Article</a>
</div>
<!-- début du container -->
<div class="container mt-5">
    <!-- début de la row -->
    <div class="row">
        <?= $contenu; ?>
    </div>
    <!-- fin de la row -->
</div>
<!-- fin du container -->
<?php
require_once "../inc/adminFooter.inc.php";
?>