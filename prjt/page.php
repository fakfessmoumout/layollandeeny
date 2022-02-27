<?php 
    session_start();
    require_once 'config.php';
        if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
        }
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>

<?php
//on définit notre variable pour pouvoir inclure les fichier
define("C2SCRIPT","peut être n'importe quoi ici");
include("fonctions.php");

//on se connecte à la base de données (à adapter/remplacer avec votre système de connexion)
$BDD = array();
$BDD['serveur'] = "localhost";
$BDD['login'] = "root";
$BDD['pass'] = "";
$BDD['bdd'] = "connect";
$mysqli = mysqli_connect($BDD['serveur'],$BDD['login'],$BDD['pass'],$BDD['bdd']);
if(!$mysqli) exit('Connexion MySQL non accomplie!');


?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style4.css">
        <title>Page de commentaire</title>
        
    </head>
    <body>
    <h1>Commentaires d'Educ-Tom :</h1>

    <p>Bienvenue, ici vous pouvez lire les commentaires des autres utilisateurs et faites-vous plaisir, postez un commentaire ! Sinon <a class="one" href="eductom.php">Retourner à l'Acceuil</a></p>

    <h2>Commentaires Postés :</h2>

    <?php
    afficherCommentaires(123);
    ?>

	<h2>Écrire un Commentaire :</h2>

	<?php
	//on affiche le formulaire pour poster un commentaire
	afficherFormulaireCommentaire("page.php",123);// indiquer la page actuelle avec ou sans query du type ?id=123&... et l'id de la'rticle pour affiche les commentaire de cette article seulement, si vous utilisez ce système de commentaire pour un livre d'or par exemple, vous pouvez l'enlever et mettre seulement la page actuelle: afficherFormulaireCommentaire("page.php");
	?>

	
	</body>
</html>