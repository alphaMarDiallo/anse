<?php require_once 'inc/header.inc.php'; 
//    variables d'affichage : 
$msgFirstName = '';
$msgLastName = '';
$msgtestimony = '';
$msg = "";

if ($_POST) // si on valide le formulaire, on entre dans le IF
{
    // formulaire valide uniquement si la case prénom contient le nombre de caractères demandé
    if (empty($_POST['tFirstName'])  || iconv_strlen($_POST['tFirstName']) < 3 || iconv_strlen($_POST['tFirstName']) > 30) {
        $msgFirstName = '<span class="text-danger text-justify ">**Prénom doit contenir entre 2 et 30 caractères. </span>';
    }
    // formulaire valide uniquement si la case nom contient le nombre de caractères demandé
    if (empty($_POST['tLastName'])  || iconv_strlen($_POST['tLastName']) < 2 || iconv_strlen($_POST['tLastName']) > 30) {
        $msgLastName = '<span class="text-danger text-justify">**Nom doit contenir entre 2 et 30 caractères. </span>';
    }
    // formulaire valide uniquement si the text area contient le nombre de caractères demandé
    if (empty($_POST['testimony']) || iconv_strlen($_POST['testimony']) < 2 || iconv_strlen($_POST['testimony']) > 200) {
        $msgtestimony = '<span class="text-justify text-danger">**Le champs doit contenir minimum 5 caractères. </span>';
    }
    if (empty($msgFirstName) && empty($msgLastName) && empty($msgtestimony)) {
        // Si l'internaute a bien rempli le formulaire, cela veut dire qu'il n'est passé dans aucune des conditions IF donc la varaible $error est vide, nous pouvons donc executer le traitement de l'insertion (requete préparée)
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        }
        //insertion bdd 
        $testimony_insert = $bdd->prepare("INSERT INTO testimony (tFirstName, tLastName, testimony) VALUES (:tFirstName, :tLastName, :testimony)");

        foreach ($_POST as $key => $value) {
            $testimony_insert->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        //A ce stade aucun enregistrement n'est possible il nous faut donc appeller la var "$testimony_insert" et l'éxecuter comme ceci --> :
        $testimony_insert->execute();
//********************
        $msg .= '<div class="alert alert-success text-center">**Nom doit contenir entre 2 et 30 caractères. </div>';
    }
}
?>
<a href="temoignages.php"><i class="fas fa-reply"></i></a>
<div class="container mt-5 offset-4">
    <!-- Formulaire témoignages  -->
    <div class="col-md-8"><?php echo $msg; ?></div>
    <form class="col-md-12 mt-5" method="post">
        <div class="row">
            <div class="form-group col-md-4 ">
                <?php echo  $msgFirstName; ?>
                <input type="text" class="form-control rounded-pill bg-form" name="tFirstName" placeholder="Prénom">
            </div>
            <!-- Fin case prénom -->
            <div class="form-group col-md-4">
                <?php echo $msgLastName; ?>
                <input type="text" class="form-control rounded-pill bg-form" name="tLastName" placeholder="Nom">
            </div>
            <!-- Fin case nom -->
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <textarea class="form-control bg-form" name=" testimony" rows="6"></textarea>
                <?php echo $msgtestimony; ?>
            </div>
        </div>
        <button type="submit"
            class="col-md-2 offset-3 btn btn-outline-success btn-block mb-4 rounded-pill hover">Postez</button>

    </form>
</div>
<!--Fin de la Div container  -->
<?php require_once 'inc/footer.inc.php' ?>