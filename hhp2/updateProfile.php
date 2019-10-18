<?php
require_once "inc/init.inc.php";
require_once "inc/Header.inc.php";
// a décommenter en temps et en heures
// if(!userConnectedAdmin())
// {
//    header("location:" . URL);
// }
extract($_POST);
extract($_GET);
$contenu = "";
$errors = "";
$success = "";
echo '<pre style="background:#000;color:#fff;">';
print_r($_POST);
echo '</pre>';
if (isset($_GET['action']) && $_GET['action'] == 'update' && ($_GET['id'])) {
    $req = $pdo->prepare("SELECT * FROM members WHERE idMember = :idMember");
    $req->bindParam(':idMember', $id);
    $req->execute();
    if ($req->rowCount() > 0) {
        //Je récupère des infos en BDD pour afficher dans le formulaire de modification
        $member_update = $req->fetch(PDO::FETCH_ASSOC);
    }
} //FIN if(isset($_GET['action']) && $_GET['action'] == 'update'
//------------------------------------- MODIFICATION EN BDD -------------------------------------
if ($_POST) {
    if (!isset($civilite) || $civilite != 'Mr' && $civilite != 'Mme') {
        $errors .= '<div class="alert-danger text-warning">Vous devez choisir votre titre</div>';
    }
    if (!isset($firstName) || iconv_strlen($firstName) < 2  ||  iconv_strlen($firstName) > 100) {
        $errors .= '<div class="alert-danger text-warning">Saisissez votre Prénom (100 caractères max )</div>';
    }
    if (!isset($lastName) || iconv_strlen($lastName) < 2  ||  iconv_strlen($lastName) > 100) {
        $errors .= '<div class="alert-danger text-warning">Saisissez votre nom de famille (100 caractères max )</div>';
    }
    if (empty($dateOfBirth)) {
        $errors .= '<div class="alert-danger text-warning">Indiquez votre date de naissance</div>';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors .= '<div class="alert-danger text-warning">Indiquez votre date de naissance</div>';
    }
    if (empty($address) || iconv_strlen($address) < 5  || iconv_strlen($address) > 200) {
        $errors .= '<div class="alert-danger text-warning">Indiquez votre adresse</div>';
    }
    if (empty($country) || $country != 'France' && $country != 'Belgique') {
        $errors .= '<div class="alert-danger text-warning">Indiquez votre pays</div>';
    }
    if (empty($phone) || !preg_match('#^[0-9]{10}+$#', $phone)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer un numéro de téléphone valide</div>';
    }

    if (empty($errors)) {
        $replace  = $bdd->prepare("UPDATE members SET civilite = :civilite, firstName = :firstName, lastName = :lastName, dateOfBirth = :dateOfBirth, email = :email, address = :address, country = :country, phone = :phone, status = :status WHERE idMember = $idMember");
        // $replace = $pdo->prepare("REPLACE INTO members VALUES( :idMember, :civilite, :firstName, :lastName,  :dateOfBirth, :email, :password, :address, :country, :phone, :status)", array(
        //     ':idMember' => $idMember,
        //     ':civilite' => $civilite,
        //     ':firstName' => $firstName,
        //     ':lastName' => $lastName,
        //     ':dateOfBirth' => $dateOfBirth,
        //     ':email' => $email,
        //     ':password' => $password,
        //     ':address' => $address,
        //     ':country' => $country,
        //     ':phone' => $phone,
        //     ':status' => $status
        // ));

        // $replace->bindValue(':idMember', $idMember);
        $replace->bindValue(':civilite', $civilite);
        $replace->bindValue(':firstName', $firstName);
        $replace->bindValue(':lastName', $lastName);
        $replace->bindValue(':dateOfBirth', $dateOfBirth);
        $replace->bindValue(':email', $email);
        // $replace->bindValue(':password', $password);
        $replace->bindValue(':address', $address);
        $replace->bindValue(':country', $country);
        $replace->bindValue(':phone', $phone);
        $replace->bindValue(':status', $status);
    }

    $success .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Modification enregistré.</div>';
}
?>
<div class="row">
</div>
<div class="container mt-5">
    <!-- Material form register -->
    <div class="card offset-3">

        <h5 class="card-header info-color white-text text-center py-4">
            <strong>Modification du Profil</strong>
        </h5>

        <!--Card content-->
        <div class="card-body px-lg-5">
            <? $errors; ?>
            <? $success; ?>
            <!-- Form -->
            <form class="text-center" style="color: #757575;" method="POST">
                <input type="hidden" name="idMember" value="<?php echo $member_update['idMember'] ?>">
                <input type="hidden" name="password" value="<?php echo $member_update['password'] ?>">
                <input type="hidden" name="status" value="<?php echo $member_update['status'] ?>">

                <div class="form-row">
                    <div class="col">
                        <!-- select -->
                        <div class="md-form m-2">
                            <select name="civilite" id="civilite">
                                <option value="Civilite">Titre</option>
                                <option value="Civilite">
                                    <?php echo $member_update['civilite']  ?>
                                </option>
                                <option value="Mr">Mr</option>
                                <option value="Mme">Mme</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <!-- First name -->
                        <div class="md-form">
                            <input type="text" class="form-control m-2" name="firstName"
                                value="<?php echo $member_update['firstName'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <!-- Last name -->
                        <div class="md-form">
                            <input type="text" class="form-control m-2" name="lastName"
                                value="<?php echo $member_update['lastName']  ?>">
                        </div>
                    </div>
                </div>

                <!-- Date of Birth  -->
                <div class="md-form mt-0">
                    <input type="date" class="form-control m-2" name="dateOfBirth"
                        value="<?php echo $member_update['dateOfBirth'] ?>">
                </div>
                <!-- E-mail -->
                <div class=" md-form mt-0">
                    <input type="email" class="form-control m-2" name="email"
                        value="<?php echo $member_update['email'] ?>">
                </div>

                <!-- address -->
                <div class=" md-form">
                    <input type="address" class="form-control m-2" name="address"
                        aria-describedby="materialRegisterFormPasswordHelpBlock"
                        value="<?php echo $member_update['address'] ?>">
                </div>

                <!-- Phone country -->
                <div class=" md-form">
                    <select name="country">
                        <option value="default">
                            <?php echo $member_update['country'] ?>
                        </option>
                        <option value="France">France</option>
                        <option value="Belgique">Belgique</option>
                    </select>
                </div>
                <!-- Phone number -->
                <div class="md-form">
                    <input type="text" class="form-control m-2" aria-describedby="materialRegisterFormPhoneHelpBlock"
                        name="phone" value="<?php echo $member_update['phone'] ?>">
                </div>

                <!-- Sign up button -->
                <!-- <button class="btn btn-outline-info btn-rounded btn-block mt-2" type="submit">Enregistrer</button> -->

                <button type="submit" class="btn bouton_vert">Modifier</button>

            </form>
            <!-- Form -->

        </div>

    </div>
    <!-- Material form register -->

    <?php require_once 'inc/footer.inc.php'; ?>