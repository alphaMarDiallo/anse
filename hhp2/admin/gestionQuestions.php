<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
extract($_GET);
//variable d'affichage
$contenu = "";
// ---------------SUPPRESSION D' UN PATIENT'-----------------------
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($id)) {
    $member_delete = $pdo->prepare("DELETE FROM faq WHERE idFaq = $id");
    $member_delete->bindValue(':idFaq', $id, PDO::PARAM_STR);
    $member_delete->execute();
    $_GET['action'] = 'affichage'; // on redirige vers l'affichage des articles
    // $validate .= "<div class='alert-warning col-md-6 offset-md-3  mb-2 text-center'>le patient n° <strong>$id</strong> a bien été supprimé !</div>";
}
// AFFICHAGE DES PATIENTS DANS UN TABLEAU
$resultat = $pdo->query("SELECT * FROM faq");
while ($faq = $resultat->fetch(PDO::FETCH_ASSOC)) :
    // foreach ($membres as $key => $tab)
    $contenu .= '<tr>';
    $contenu .= '<th scope="col">' . $faq['civilite'] . '</th>';
    $contenu .= '<th scope="col">' . $faq['faqFirstName'] . '</th>';
    $contenu .= '<th scope="col">' . $faq['faqLastName'] . '</th>';
    $contenu .= '<th scope="col">' . $faq['faqEmail'] . '</th>';
    $contenu .= '<th scope="col">' . $faq['faqMessage'] . '</th>';
    $contenu .= '<th scope="col"><a href="?action=suppression&id=' . $faq['idFaq'] . '" class="col-6 text-danger fa-2x" onclick="return(confirm(\'En êtes vous certain ?\'))"><i class="fas fa-trash-alt"></i></a></th>';
    $contenu .= '</tr>';
endwhile;
?>
<div class="row">
    <h3 class="text-center offset-md-5">Liste des Question</h3>
</div>
<div class="container mt-5">
    <table id="tab" class="table table-hover table-dark text-center display">
        <thead>
            <tr>
                <th scope="col">Civilité</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Question</th>
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