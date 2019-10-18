<?php
// Connexion à la BDD :
try {
    $pdo = new PDO(
        'mysql:host=localhost;dbname=anse_hhp',
        'root',
        '',
        array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8',
        )
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// SESSION :
session_start();
//------ CHEMIN
define("RACINE_SITE", $_SERVER['DOCUMENT_ROOT'] . '/anse/hhp2');
// $_SERVER['DOCUMENT_ROOT'] --> C:/xampp/htdocs
// Lors de l'enregistrement d'image / photos, nous aurons besoin du chemin physique complet pour enregistrer la photo dans le bon dossier
// echo RACINE_SITE;
define("URL", "http://localhost/anse/hhp2");
//echo URL;
// cette constante servira entre autre à enregistrer l'URL d'une photo / image dans la BDD, on ne conserve jamais la photo elle même, ce serait trop lourd pour la BDD

//--------FAILLES XSS
foreach ($_POST as $key => $value) {
    $_POST[$key] = strip_tags(trim($value)); // 'strip_tags', supprime les balises HTML, et 'trim' supprime les espaces en debut et fin de chaine.    
    $_POST[$key] = htmlspecialchars(trim($value));
}
//--------GET    
foreach ($_GET as $key => $value) {
    $_GET[$key] = strip_tags(trim($value));
    $_GET[$key] = htmlspecialchars(trim($value));
}

require_once 'function.inc.php';