<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
//**************** */
extract($_POST);
extract($_GET);
//**************** */
// variable d'erreurs vide
$errors = "";
// variable de validation vide
$validate = "";
// validation formulaire Article
//------------------------------------- MODIFICATION -------------------------------------
if (isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])) {
    $req = $pdo->prepare("SELECT * FROM articles WHERE idArticle = :idArticle");
    $req->bindParam(':idArticle', $id);
    $req->execute();
    if ($req->rowCount() > 0) {
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $art_update = $req->fetch(PDO::FETCH_ASSOC);
    }
} //FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
//------------------------------------- INSERTION EN BDD -------------------------------------
if ($_POST) {
    if (empty($titleArticle) || (iconv_strlen($titleArticle) < 2  || iconv_strlen($titleArticle) > 151)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Entrez un texte entre 2 et 150 caractères</div>';
    }
    if (empty($article) || (iconv_strlen($article) < 10)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Entrez un article d\'au moins 20 caractères</div>';
    }

    // si le formulaire ne comporte pas d'erreurs, il est validé et l'enregistrement en base de donnée se fait    
    if (empty($errors)) {
        $article_insert = $pdo->prepare("INSERT INTO articles (titleArticle, article, link, dateArt) VALUES (:titleArticle, :article, :link, NOW())");

        $article_insert->bindValue(":titleArticle", $titleArticle, PDO::PARAM_STR);
        $article_insert->bindValue(":article", $article, PDO::PARAM_STR);
        $article_insert->bindValue(":link", $link, PDO::PARAM_STR);
        $article_insert->execute();

        $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Votre article à bien été enregistré</div>';
    }
}

?>
<div class="container">
    <?php if (isset($_GET['action']) && $_GET['action'] === 'update' && isset($_GET['id'])) { ?>
    <h2 class="text-warning text-center m-5">Modifier votre Article</h2>
    <?php } else { ?>
    <h2 class="text-center text-info m-5">Ajouter un nouvel Article</h2>
    <?php } ?>
    <div class="row">
        <a href="../admin/gestionArticles.php"><i class="far fa-arrow-alt-circle-left fa-2x text-success"></i></a>
    </div>
    <?= $errors ?>
    <?= $validate ?>
    <form class="mt-5" method="post">
        <div class="form-row m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Titre article" name="titleArticle"
                    value="<?php echo $art_update['titleArticle'] ?? $_POST['titleArticle'] ?? '' ?>">
            </div>
        </div>
        <div class="form-row m-2">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                name="article"><?php echo $art_update['article'] ?? $_POST['article'] ?? '' ?></textarea>
        </div>
        <div class="form-row  m-2">
            <div class="col-md-6">
                <input type="text" class="form-control " placeholder="Lien" name="link"
                    value="<?php echo $art_update['link'] ?? $_POST['link'] ?? '' ?>">
            </div>
        </div>
        <input type="submit" class="btn btn-outline-success offset-md-5 mt-5" value="Enregistrer">
    </form>
</div>
<?php
require_once "../inc/adminFooter.inc.php";
?>