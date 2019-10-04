<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
?>


<div class="row">
    <h3 class="text-center offset-md-5">Liste des Patients</h3>
</div>
<div class="container mt-5">
    <table class="table table-striped table-dark text-center">
        <thead>
            <tr>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Pays</th>
                <th scope="col">Jour de la consultation</th>
                <th scope="col">Heure de la consultation</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>fiche</td>
                <td>suppression</td>
            </tr>
        </tbody>
    </table>
</div>
<?php
require_once "../inc/adminFooter.inc.php";
?>