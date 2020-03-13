<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";

// a décommenter en temps et en heures
// if(!userConnectedAdmin())
// {
//    header("location:" . URL);
// }
extract($_GET);
$contenu = "";

// ---------------SUPPRESSION D' UN PATIENT'-----------------------

if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id'])) {
    $member_delete = $pdo->prepare("DELETE FROM members WHERE idMember = :id");
    $member_delete->bindValue(':id', $id, PDO::PARAM_STR);
    $member_delete->execute();
    $_GET['action'] = 'affichage'; // on redirige vers l'affichage des articles
    $validate .= "<div class='alert-warning col-md-6 offset-md-3  mb-2 text-center'>le membre n° <strong>$id</strong> a bien été supprimé !</div>";
}

//---------------AFFICHAGE DU PATIENT -----------------------
// J'affiche les information d'un seul patient
if (isset($_GET['action']) && $_GET['action'] == 'show' && isset($_GET['id'])) {
    $resultat = $pdo->prepare("SELECT * FROM members  WHERE idMember= :idMember");
    $resultat->bindValue(':idMember', $_GET['id'], PDO::PARAM_INT);
    $resultat->execute();
    if ($resultat->rowCount() > 0) {

        $member = $resultat->fetch(PDO::FETCH_ASSOC);
    }
}

//---------------HISTORIQUE HISTORIQUE DE RDV-----------------------
?>
<div class="row">
</div>
<div class="container mt-5">
    <h3 class="text-center m-2">Fichier patient : </h3>
    <div class="row">
        <a href="../admin/gestionPatients.php"><i class="far fa-arrow-alt-circle-left fa-2x text-success m-4"></i></a>
    </div>
    <form class="m-3">
        <div class="form-row m-2">
            <div class="col">
                <input type="text" name="firstName" class="form-control" placeholder="Prénom : "
                    value="<?= $member['firstName'] ?>">
            </div>
            <div class="col">
                <input type="text" name="lastName" class="form-control" placeholder="Nom : "
                    value="<?= $member['lastName'] ?>">
            </div>
        </div>
        <div class="form-row m-2">
            <div class="col">
                <input type="text" name="dateOfBirth" class="form-control" placeholder="Date de Naissance : "
                    value="<?= $member['dateOfBirth'] ?>">
            </div>
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Email : "
                    value="<?= $member['email'] ?>">
            </div>
        </div>
        <div class="form-row  m-2">
            <div class="col">
                <input type="text" name="phone" class="form-control" placeholder="Téléphone : "
                    value="<?= $member['phone'] ?>">
            </div>
            <div class="col">
                <input type="text" name="address" class="form-control" placeholder="Adresse "
                    value="<?= $member['address'] ?>">
            </div>
        </div>
        <!-- <div class="col-md-6">
            <input type="text" name="address" class="form-control" placeholder="Adresse "
                value="<//?= $member['country'] ?>">
        </div> -->
    </form>
        <?= $contenu;?>
    <?php
    require_once "../inc/adminFooter.inc.php";
    ?>