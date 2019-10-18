<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
//variable de connexion
$contenu = "";
extract($_GET);
// ---------------SUPPRESSION D' ARTICLE'-----------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression') {
    $article_delete = $pdo->prepare("DELETE FROM articles WHERE idArticle = :idArticle");
    $article_delete->bindValue(':idArticle', $id, PDO::PARAM_INT);
    $article_delete->execute();
    // $_GET['action'] = 'affichage'; // on redirige vers l'affichage des articles
    $validate .= "<div class='alert-warning col-md-6 offset-md-3  mb-2 text-center'>l' article n° <strong>$id</strong> a bien été supprimé !</div>";
}
// requete pour afficher les infos article
if (isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['id'])) {
    $data = $pdo->prepare("SELECT *FROM articles WHERE idArticle = :idArticle ");
    $data->bindValue(':idArticle', $id, PDO::PARAM_INT);
    $data->execute();
    if ($data->rowCount() > 0) {
        $art = $data->fetch(PDO::FETCH_ASSOC);
    }
}
$contenu .= '<div class="card text-center col-md-3 offset-1 m-5 mx-auto">';
$contenu .= '<div class="card-header">';
$contenu .= '<h5>' . $art['titleArticle'] . '</h5>';
$contenu .= '</div>';
$contenu .= '<div class="card-body">';
$contenu .= '<p  class="card-text text-justify">' . $art['article'] . '</p>';
$contenu .= '<a href="https://' . $art['link'] . '" class="btn btn-outline-primary" target="_blank">' . $art['link'] . '</a>';
$contenu .= '</div>';
$contenu .= '<div class="card-footer text-muted">';
$contenu .= '<a href="../form/formArticle.php?action=update&id=' . $art['idArticle'] .
    '"><i class="far fa-edit text-warning fa-2x m-3"></i></a>';
$contenu .= '<a href="?action=delete&id=' . $art['idArticle'] . '"
    onclick="return(confirm(\'En êtes vous certain ?\'))"><i class="fas fa-trash-alt text-danger fa-2x  m-3"></i></a>';
$contenu .= '</div>';
$contenu .= '</div>';
?>
<div id="container" class="row">
    <?= $contenu; ?>
</div>