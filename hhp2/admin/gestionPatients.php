<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
extract($_GET);
//variable d'affichage
$contenu = "";
// ---------------SUPPRESSION D' UN PATIENT'-----------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($id)) {
    $member_delete = $pdo->prepare("DELETE FROM members WHERE idMember = $id");
    $member_delete->bindValue(':id', $id, PDO::PARAM_STR);
    $member_delete->execute();
    $_GET['action'] = 'affichage'; // on redirige vers l'affichage des articles
    // $validate .= "<div class='alert-warning col-md-6 offset-md-3  mb-2 text-center'>le patient n° <strong>$id</strong> a bien été supprimé !</div>";
}
// AFFICHAGE DES PATIENTS DANS UN TABLEAU
$resultat = $pdo->query("SELECT * FROM members as m, rdv as r WHERE m.idMember = r.memberId");
while ($members = $resultat->fetch(PDO::FETCH_ASSOC)) :
    // foreach ($membres as $key => $tab)
    $contenu .= '<tr>';
    $contenu .= '<th scope="col">' . $members['firstName'] . '</th>';
    $contenu .= '<th scope="col">' . $members['lastName'] . '</th>';
    $contenu .= '<th scope="col">' . $members['email'] . '</th>';
    $contenu .= '<th scope="col">' . $members['country'] . '</th>';
    // $contenu .= '<th scope="col">' . $members['rdvDate'] . '</th>';
    // $contenu .= '<th scope="col">' . $members['rdvTime'] . '</th>';
    $contenu .= '<th scope="col"><a href="fichePatient.php?action=show&id=' . $members['idMember'] . '"><i class="far fa-eye text-info fa-2x"></i></a></th>';
    $contenu .= '<th scope="col"><a href="?action=suppression&id=' . $members['idMember'] . '" class="col-6 text-danger fa-2x" onclick="return(confirm(\'En êtes vous certain ?\'))"><i class="fas fa-trash-alt"></i></a></th>';
    $contenu .= '</tr>';
endwhile;
?>
<div class="row">
    <h3 class="text-center offset-md-5">Liste des Patients</h3>
</div>
<div class="container mt-5">
    <table id="tab" class="table table-hover table-dark text-center display">
        <thead>
            <tr>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Pays</th>
                <!-- <th scope="col">Jour de la consultation</th>
                <th scope="col">Heure de la consultation</th> -->
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?= $contenu; ?>
        </tbody>
    </table>
</div>
<?php
require_once "../inc/adminFooter.inc.php";
?>