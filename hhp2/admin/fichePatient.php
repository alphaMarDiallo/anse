<?php
require_once "../inc/init.inc.php";
require_once "../inc/adminHeader.inc.php";
?>


<div class="row">
</div>
<div class="container mt-5">
    <h3 class="text-center m-2">Fichier patient : </h3>
    <form class="m-3">
        <div class="form-row m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Prénom">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Nom">
            </div>
        </div>
        <div class="form-row m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Date de Naissance">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="form-row  m-2">
            <div class="col">
                <input type="text" class="form-control" placeholder="Addresse">
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Téléphone">
            </div>
        </div>
        <div class="form-row  m-2">
            <div class="col-3">
                <select id="inputState" class="form-control">
                    <option selected>France</option>
                    <option>Belgique</option>
                </select>
            </div>
        </div>
    </form>

    <div class="row">
        <h3 class="text-center m-2">Historique des RDV : </h3>
    </div>
    <table class="table table-striped table-dark text-center">
        <thead>
            <tr>
                <th scope="col">Jour de la consultation</th>
                <th scope="col">Heure de la consultation</th>
                <th scope="col">Pays</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mark</td>
                <td>Otto</td>
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