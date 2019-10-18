<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
//------------------------------------- MODIFICATION -------------------------------------
if (isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])) {
    $req = $pdo->prepare("SELECT * FROM members WHERE idMember = :idMember");
    $req->bindParam(':idMember', $id);
    $req->execute();
    if ($req->rowCount() > 0) {
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $member_update = $req->fetch(PDO::FETCH_ASSOC);
    }
} //FIN if(isset($_GET['action']) && $_GET['action'] == 'update'

//------------------------------------- INSERTION EN BDD -------------------------------------
if ($_POST) {
    if (empty($firstName) || (iconv_strlen($firstName) < 2 || iconv_strlen($firstName) > 201)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer un prenom compris entre 2 et 200 caractères</div>';
    }
    if (empty($lastName) || (iconv_strlen($lastName) < 2 || iconv_strlen($lastName) > 201)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer un nom compris entre 2 et 200 caractères</div>';
    }
    if (empty($dateOfBirth)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer une date de naissance au format jj-mm-aaaa</div>';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer un email valide</div>';
    }
    if (empty($password)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez un mot de passe compris entre 2 et 255 caractères</div>';
    }
    if (empty($address) || (iconv_strlen($address) < 2 ||   iconv_strlen($address) > 201)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer une adresse comprise entre 2 et 200 caractères</div>';
    }
    if (empty($country) || $country == 'default') {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez renseigner vôtre pays</div>';
    }
    if (empty($phone) || !preg_match('#^[0-9]{10}+$#', $phone)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer un numéro de téléphone valide</div>';
    }
    // si le formulaire ne comporte pas d'erreurs, il est validé et l'enregistrement en base de donnée se fait
    if (empty($errors)) {

        // requete préparée insertion membre
        $member_insert = $pdo->prepare("INSERT INTO members (firstName, lastName, dateOfBirth, email, address, phone, country) VALUES (:firstName, :lastName, :dateOfBirth , :email, :address, :phone, :country)");

        $member_insert->bindValue(":firstName", $firstName, PDO::PARAM_STR);
        $member_insert->bindValue(":lastName", $lastName, PDO::PARAM_STR);
        $member_insert->bindValue("dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
        $member_insert->bindValue(":email", $email, PDO::PARAM_STR);
        $member_insert->bindValue(":address", $address, PDO::PARAM_STR);
        $member_insert->bindValue(":phone", $phone, PDO::PARAM_INT);
        $member_insert->bindValue(":country", $country, PDO::PARAM_STR);

        $member_insert->execute();

        $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Votre inscription à bien été enregistrée, vous pouvez maintenant vous connecter</div>';
    }
}

?>
<div class="container">
    <h4 class="m-5">Patient : </h4>
    <div class="row">
        <a href="../admin/gestionPatients.php"><i class="far fa-arrow-alt-circle-left fa-2x text-success m-4"></i></a>
    </div>
    <form class="mt-5" method="post">
        <div class="form-row m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Prénom" name="firstName"
                    value="<?php echo $member_update['firstName'] ?? $_POST['firstName'] ?? '' ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom" name="lastName"
                    value="<?php echo $member_update['lastName'] ?? $_POST['lastName'] ?? '' ?>">
            </div>
        </div>
        <div class="form-row m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Date de Naissance" name="dateOfBirth"
                    value="<?php echo $member_update['dateOfBirth'] ?? $_POST['dateOfBirth'] ?? '' ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Email" name="email"
                    value="<?php echo $member_update['email'] ?? $_POST['email'] ?? '' ?>">
            </div>
        </div>
        <div class="form-row  m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Addresse" name="address"
                    value="<?php echo $member_update['address'] ?? $_POST['address'] ?? '' ?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Téléphone" name="phone"
                    value="<?php echo $member_update['phone'] ?? $_POST['phone'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <select id="inputState" class="form-control" name="country">
                <option value="" selected>Pays</option>
                <option value="france">France</option>
                <option value="belgique">Belgique</option>
            </select>
        </div>
</div>
<input type="submit" class="btn btn-success mt-5 offset-md-5" value="Enregistrer">
</form>
</div>
<?php
require_once "../inc/adminFooter.inc.php";
?>