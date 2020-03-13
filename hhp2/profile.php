<?php
require_once "inc/init.inc.php";
require_once "inc/Header.inc.php";
extract($_GET);
//variable d'affichage
$contenu = "";
//---------------AFFICHAGE DE L'HISTORIQUE -----------------------
$req = $pdo->query("SELECT * FROM members");
$member = $req->fetch(PDO::FETCH_ASSOC);
foreach ($_SESSION['members'] as $key => $value) {
    if ($key != '$connectPw' && $key != 'status') // on exclu le mdp
    {
        $value;
    }
}
?>
<section class="contact-section my-5 offset-md-1">
    <!-- Form with header -->
    <div class="card">
        <!-- Grid row -->
        <div class="row">
            <!-- Grid column -->
            <div class="col-lg-8">
                <div class="card-body form">
                    <!-- Header -->
                    <h3 class="mt-4"><i class="fas fa-user-circle"></i> Bienvenue:</h3>
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="form-contact-name" class="form-control m-2"
                                    value="<?= $_SESSION['members']['firstName'] ?>">
                            </div>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="form-contact-email" class="form-control m-2"
                                    value="<?= $_SESSION['members']['lastName'] ?>">
                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="date" id="form-contact-phone" class="form-control m-2"
                                    value="<?= $_SESSION['members']['dateOfBirth'] ?>">
                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                    <!-- Grid row -->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <textarea id="form-contact-message" class="form-control md-textarea"
                                    rows="3"><?= $_SESSION['members']['address'] ?></textarea>
                                <label for="form-contact-message"></label>
                                <a class="btn-floating btn-lg blue">
                                </a>
                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </div>
            <!-- Grid column -->
            <!-- Grid column -->
            <div class="col-lg-4">
                <div class="card-body contact text-center h-100 white-text">
                    <h3 class="my-4 pb-2">Contact information</h3>
                    <ul class="text-lg-left list-unstyled ml-4">
                        <!-- <li>
                            <p><i class="fas fa-map-marker-alt pr-2"></i><?= $_SESSION['members']['country'] ?>
                            </p>
                        </li> -->
                        <li>
                            <p><i class="fas fa-phone pr-2"></i><?= $_SESSION['members']['phone'] ?></p>
                        </li>
                        <li>
                            <p><i class="fas fa-envelope pr-2"></i><?= $_SESSION['members']['email'] ?></p>
                        </li>
                    </ul>
                    <hr class="hr-light my-4">
                </div>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row -->
    </div>
    <!-- Form with header -->
</section>
<!-- Section: Contact v.3 -->
<?php require_once 'inc/footer.inc.php'; ?>