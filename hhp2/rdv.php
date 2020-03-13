<?php
require_once 'inc/init.inc.php';
require_once 'inc/header.inc.php';
//  Variables d'affichage :
$civiliteError = '';
$faqFirstNameError = '';
$faqLastNameError = '';
$faqEmailError = '';
$faqMessageError = '';
$faqMsgValidate = '';
extract($_POST);
//  Traitement php du formulaire Faq
if ($_POST) {
    //1 - JE VERIFIE MES CHAMPS
    if (empty($civilite) || $civilite != 'Mr' && $civilite != 'Mme') {
        $civiliteError .= '<small class="text-danger"> ** Sélectionnez un titre de civilité</small>';
    }
    if (empty($faqFirstName) || iconv_strlen($faqFirstName) < 2 ||  iconv_strlen($faqFirstName) > 60) {
        $faqFirstNameError .= '<small class="text-danger"> ** Saisissez un prenom entre 2 et 60 clastéres</small>';
    }
    if (empty($faqLastName) || iconv_strlen($faqLastName) < 2 ||  iconv_strlen($faqLastName) > 60) {
        $faqLastNameError .= '<small class="text-danger"> ** Saisissez un nom entre 2 et 60 clastéres</small>';
    }
    if (empty($faqEmail) || !filter_var($faqEmail, FILTER_VALIDATE_EMAIL)) {
        $faqEmailError .= '<small class="text-danger"> ** Saisissez un email </small>';
    }
    if (empty($faqMessage) || iconv_strlen($faqMessage) < 5 || iconv_strlen($faqMessage) > 200) {
        $faqMessageError .= '<small class="text-danger"> ** Saisissez un message entre 5 et 200 clastéres</small>';
    }
    // Insertion en base de données
    if (empty($faqFirstNameError) && empty($faqLastNameError) && empty($faqEmailError) && empty($faqEmailError)) {
        // assainissement des données du formulaire
        foreach ($_POST as $indice => $valeur) {
            $_POST[$indice] = htmlspecialchars($valeur, ENT_QUOTES);
        } // Fin foreach
        // Requete d'insertion 
        $newQuestion = $pdo->prepare("INSERT INTO faq (civilite, faqFirstName, faqLastName, faqEmail, faqMessage) VALUES (:civilite, :faqFirstName, :faqLastName, :faqEmail, :faqMessage)");
        $newQuestion->bindValue(":civilite", $civilite, PDO::PARAM_STR);
        $newQuestion->bindValue(":faqFirstName", $faqFirstName, PDO::PARAM_STR);
        $newQuestion->bindValue(":faqLastName", $faqLastName, PDO::PARAM_STR);
        $newQuestion->bindValue(":faqEmail", $faqEmail, PDO::PARAM_STR);
        $newQuestion->bindValue(":faqMessage", $faqMessage, PDO::PARAM_STR);
        $newQuestion->execute();
        //************
        $faqMsgValidate .= '<div class="alert alert-success">votre question a bien été envoyé. </div>';
    } // Fin if(empty())
} // Fin if($_POST)       
?>
<!--Colonne de gauche-->
<div class="container">
    <div class="row">
        <!-- FIRST COLUMN -->
        <div class="col-md-5 col-sm-12 col-12 address">
            <h6 class="text-center">Anne-Cécile ROUGIER</h6>
            <p class="text-center">23 rue de la folie Méricourt-75011 Paris</p>
            <br>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.7704676860394!2d2.3711157156745233!3d48.86258717928785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66dfb861f8079%3A0x3d12cedc238537f8!2s23+Rue+de+la+Folie+M%C3%A9ricourt%2C+75011+Paris!5e0!3m2!1sfr!2sfr!4v1561459143499!5m2!1sfr!2sfr"
                class="col-md-12" width="450" height="150" frameborder="0" style="border:0" allowfullscreen
                class="mt-2"></iframe>
            <br>
            <br>
            <p class="text-center">Si vous avez des questions utilisez le formulaire :</p>
            <div class="container p-0">
                <!--formulaire pour question-->
                <h4>Je suis à votre écoute :</h4>
                <?php echo $faqMsgValidate; ?>
                <form class="col-md-12 p-0" method="POST">
                    <div class="row">
                        <div class="col">
                            <?php echo $civiliteError; ?>
                            <select name="civilite" class="form-control text-center m-1">
                                <option value="">Civilite</option>
                                <option value="Mr">Mr</option>
                                <option value="Mme">Mme</option>
                            </select>
                        </div>
                        <div class="col">
                            <?php echo $faqFirstNameError; ?>
                            <input type="text" name="faqFirstName" class="form-control text-center m-1"
                                placeholder="Prénom">
                        </div>
                        <div class="col">
                            <?php echo $faqLastNameError; ?>
                            <input type="text" name="faqLastName" class="form-control  text-center m-1"
                                placeholder="Nom">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <?php echo $faqEmailError; ?>
                            <input type="text" name="faqEmail" class="form-control  text-center m-1"
                                placeholder="Votre@email.fr">
                        </div>
                    </div>
                    <?php echo $faqMessageError; ?>
                    <textarea name="faqMessage" class="form-control" id="exampleFormControlTextarea1"
                        rows="3"></textarea>
                    <input type="submit" class="text-center btn-block rounded-pill m-1 blue-form" value="Envoyer" ;>
                </form>
                <!--FIN formulaire pour question-->
            </div>
        </div>
        <!-- SECOND COLUMN -->
        <!-- Si un membre a ouvert une SESSION (est connecté) alors il peut prendre un RDV -->
        <div class="col-md-7 col-sm-12 col-12">
            <?php if (isset($_SESSION['members'])) {  ?>
            <a id="TTE-de2dc114-eff3-4089-ae3d-3a9e37aa70f7" href="https://10to8.com/book/zhyiolarkffeheefus/"
                target="_blank">Prendre un rendez-vous en ligne</a>
            <script src="https://d3saea0ftg7bjt.cloudfront.net/embed/js/embed.min.js"></script>
            <script>
            window.TTE.init({
                targetDivId: "TTE-de2dc114-eff3-4089-ae3d-3a9e37aa70f7",
                uuid: "de2dc114-eff3-4089-ae3d-3a9e37aa70f7",
            });
            </script>
            <!-- Si il n'y a pas de SESSION d'ouverte (personne n'est inscrit ou non connecté) alors on l'invite à s'inscrire ou a se connecter -->
            <?php } elseif (!isset($_SESSION['members'])) { ?>
            <div class="row" id="center">
                <div class=" col-md-7 col-sm-12 col-12 alert-info text-secondary container">
                    Vous devez vous inscrire pour prendre un Rendez-Vous.
                </div>
            </div>
            <?php  } ?>
        </div>
    </div>
</div>
<!--FIN .row-->
<?php require_once 'inc/footer.inc.php'; ?>