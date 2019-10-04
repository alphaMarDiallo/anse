<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire Article</title>
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- CDN BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <form class="mt-5" method="post">
            <div class="form-row m-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Prénom" name="firstName">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nom" name="lastName">
                </div>
            </div>
            <div class="form-row m-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Date de Naissance" name="dateOfBirth">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                </div>
            </div>
            <div class="form-row  m-2">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Addresse" name="address">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Téléphone" name="phone">
                </div>
            </div>
            <div class="form-row  m-2">
                <div class="col-3">
                    <select id="inputState" class="form-control" name="country">
                        <option value="" selected>Pays</option>
                        <option value="fr">France</option>
                        <option value="be">Belgique</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-success" value="Enregistrer">
        </form>
    </div>
</body>

</html>