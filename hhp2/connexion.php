<?php
require_once "inc/init.inc.php";
require_once "inc/header.inc.php";
// fonction qu'on appelle redirect qui permet d'eviter le probleme d'erreur lors d'un header:location, je la rappelle plus bas lors de la redirection
extract($_POST);
extract($_GET);
// variable d'erreurs vide
$errors = "";
// variable de validation vide
$validate = "";

if (isset($_POST['inscription'])) {
    $passwordSecur = password_hash($password, PASSWORD_DEFAULT);
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
    if (empty($password2) || $password !== $password2) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Les deux mots de passe ne sont pas identiques</div>';
    }
    if (empty($address) || (iconv_strlen($address) < 2 ||   iconv_strlen($address) > 201)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer une adresse comprise entre 2 et 200 caractères</div>';
    }
    // if (empty($country) || $country == 'default') {
    //     $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez renseigner vôtre pays</div>';
    // }
    if (empty($phone) || !preg_match('#^[0-9]{10}+$#', $phone)) {
        $errors .= '<div class="col-md-4 offset-md-4 alert alert-danger text-center text-dark">Veuillez entrer un numéro de téléphone valide</div>';
    }
    // si le formulaire ne comporte pas d'erreurs, il est validé et l'enregistrement en base de donnée se fait
    if (empty($errors)) {
        // requete préparée insertion membre
        $member_insert = $pdo->prepare("INSERT INTO members (firstName, lastName, dateOfBirth, email, address, phone, password) VALUES (:firstName, :lastName, :dateOfBirth , :email, :address, :phone, :password)");
// *************************
        $member_insert->bindValue(":firstName", $firstName, PDO::PARAM_STR);
        $member_insert->bindValue(":lastName", $lastName, PDO::PARAM_STR);
        $member_insert->bindValue("dateOfBirth", $dateOfBirth, PDO::PARAM_STR);
        $member_insert->bindValue(":email", $email, PDO::PARAM_STR);
        $member_insert->bindValue(":address", $address, PDO::PARAM_STR);
        $member_insert->bindValue(":phone", $phone, PDO::PARAM_INT);
        $member_insert->bindValue(":password", $passwordSecur, PDO::PARAM_STR);
        // $member_insert->bindValue(":country", $country, PDO::PARAM_STR);
// *************************
$member_insert->execute();
// *************************
        $validate .= '<div class="col-md-4 offset-md-4 alert alert-success text-center text-dark">Votre inscription à bien été enregistrée, vous pouvez maintenant vous connecter</div>';
    }
}
// fin verification inscription
// verification connexion
if (isset($_POST["connexion"])) {
    //***************************************************************************************************************************************** */
    // On selectionne tout dans la table 'membre' à condition que la colonne pseudo ou email de la BDD soit bien égale au pseudo ou email saisie dans le formulaire
    $verif_pseudo_email = $pdo->prepare("SELECT * FROM members WHERE password = :password OR email = :email");
    $verif_pseudo_email->bindValue(':password', $connectPw, PDO::PARAM_STR);
    $verif_pseudo_email->bindValue(':email', $connectEmail, PDO::PARAM_STR);
    $verif_pseudo_email->execute();
    // Si le resultat de le requete de selection est supérieur à 0, cela veut dire que l'internaute a saisie un bon email ou bon pseudo, donc on entre dans le IF
    if ($verif_pseudo_email->rowCount() > 0) {
        $member = $verif_pseudo_email->fetch(PDO::FETCH_ASSOC); // on récupère les données en BDD de l'internaute qui a saisi le bon pseudo  ou le bon email, on va pouvoir comparer les mots de passe
        //echo '<pre>'; print_r($membre); echo '</pre>';
        // si le mot de passe de la BDD est égale le mot de passe que l'internaute a saisi dans le formulaire, on entre dans le IF
        // if(password_verify($mdp, $membre['mdp'])) / si on hache le mot de passe à l'inscription (password_hash) / password_verify permet de comparer une clé de hachage à une chaine de caractères
        // On entre dans le IF seulement dans le cas où l'interaute a saisi le bon email/pseudo et le bon mdp
        if (password_verify($connectPw, $member['password'])) {
            // on passe en revue les données de l'internaute qui a saisi le bon email/pseudo et mdp
            foreach ($member as $key => $value) {
                if ($key != '$connectPw') // on exclu le mdp
                {
                    $_SESSION['members'][$key] = $value; // pour chaque tour de boucle foreach, on enregistre les données de l'internaute dans son fichier session
                }
            }
            //echo '<pre>'; print_r($_SESSION); echo'</pre>';
            if ($_SESSION['members']['status'] != 1) {
                redirect("profile.php");
            } else {
                $_SESSION['members']['status'] = 1;
                redirect("admin/adminAccueil.php");
            }
            // aprés enregistrement des données de l'internaute dans son fichier session, on le redirige vers sa page profil
        } else // on entre dans le ELSE dans le cas où l'internaute n'a pas saisi le bon mot de passe
        {
            $errors .= '<div class="col-md-4 offset-md-4 text-center alert alert-danger"><strong>Vérifier le mot de passe !!!</strong></div>';
        }
    } else // on entre dans le ELSE si l'internaute n'a pas saisie le bon email ou le bon pseudo
    {
        $errors .= '<div class="col-md-6 offset-md-3 text-center alert alert-danger"><i class="fas fa-frown"></i><strong> Les identifiants  n\'existent pas  </strong><i class="fas fa-frown"></i> </div>';
    }
} // fin verification connexion
?>
<div class="container">
    <div class="row mx-auto">
        <!-- debut row -->
        <?= $errors ?><?= $validate ?>
        <div class="col-md-6 mx-auto" id="inscription">

            <!-- formulaire inscription -->
            <h3 class="text-center">Inscription</h3>

            <form class="col-md-12 rounded-pill text-center m-3 mx-auto" method="post">
                <!-- nom -->
                <div class="form-group">
                    <input type="text" class="form-control  rounded-pill text-center m-3" id="prenom"
                        placeholder="prenom" name="firstName">
                </div>
                <!-- prenom -->
                <div class="form-group">
                    <input type="text" class="form-control  rounded-pill text-center m-3" id="nom" placeholder="nom"
                        name="lastName">
                </div>

                <!-- date -->
                <div class="form-group">
                    <input type="date" value="" class="form-control  rounded-pill text-center m-3" id="date"
                        placeholder="date" name="dateOfBirth">
                </div>

                <!-- email -->
                <div class="form-group">
                    <input type="text" class="form-control  rounded-pill text-center m-3" id="email" placeholder="email"
                        name="email">
                </div>
                <!-- password -->
                <div class="form-group">
                    <input type="password" class="form-control  rounded-pill text-center m-3" id="mdp"
                        placeholder="Mot de passe" name="password">
                </div>
                <!-- password 2 -->
                <div class="form-group">
                    <input type="password" class="form-control  rounded-pill text-center m-3" id="mdp"
                        placeholder="Confirmer mot de passe" name="password2">
                </div>
                <!-- adresse -->
                <div class="form-group">
                    <input type="text" class="form-control  rounded-pill text-center m-3" id="adresse"
                        placeholder="Entrer vôtre adresse" name="address">
                </div>
                <!-- pays -->
                <!-- <div class="form-group">

                    <select id="inputState" class="form-control rounded-pill text-center m-3" name="country">
                        <option value="default" selected>Pays</option>
                        <option value="fr">France</option>
                        <option value="be">Belgique</option>
                    </select>
                </div> -->
                <!-- telephone -->
                <div class="form-group">

                    <input type="text" class="form-control  rounded-pill text-center m-3" id="telephone"
                        placeholder="Entrer telephone" name="phone">
                </div>
                <button type="submit" name="inscription" class="btn btn bouton_vert rounded-pill"
                    action="inscription">Submit</button>
            </form>
            <!-- fin formulaire inscription -->
        </div>
        <div class="col-md-6 mx-auto">
            <!-- formulaire connexion -->
            <h3 class="text-center">Connexion</h3>
            <form id="formConnexion" class="col-md-12  text-center form mx-auto" method="post">
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill text-center m-3" id="adminEmail"
                        name="connectEmail" placeholder="Votre@Email.com">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill text-center m-3" id="name" name="connectPw"
                        placeholder="Votre Mot de passe">
                </div>
                <input type="submit" name="connexion" class="btn btn bouton_vert rounded-pill" action="connexion">
            </form>
            <!-- fin formulaire connexion -->
        </div>
    </div><!-- fin row -->
</div>
<?php
require_once "inc/footer.inc.php";
?>