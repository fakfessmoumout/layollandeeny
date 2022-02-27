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

<!DOCTYPE html>
<html>
<head>
	<title>EducTom</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.35" />
</head>
<body>
	<header>
	<h1>Leçons :</h1>
</header>

<h2 class="p-5">
	<a class="one" href="landing.php">Session : <?php echo $data['pseudo']; ?> ! 
	<br> 
Options optionnelles de l'optionalité</a></h2>

<nav>
  <ul>
  <a href="EducTom.php">Acceuil</a>
  <br><br><br><br><br>
  <br><br><br><br><br>
  <p3>Partie Théorique :</p3>
  <br><br>
	<a href="qcm.php">QCM</a>
	<br><br><br><br><br>
  <p3>Partie Pratique :</p3>
	<br><br>
	<a href="Exo.php">Exercices d'Entrainement</a> 
	<br><br>
	<a href="Test.php">Tests / Evaluations</a>
	<br><br>
	<a href="Jeu.php">Jeu : Tom-Maths</a>
	<br><br>

</ul>
</nav>

<article>
	<p>
		Très bien ! Tu as choisi les leçons !
	</p>
<p> 
Ici, Tom-Maths te laisse choisir entre plusieurs leçons, N'ATTENDS PAS !!
</p>
<p>
	Après avoir pris connaissance de la lecon choisie, 
</p>
<p>
	Tu pourras passer à la suite en choisissant l'entrainement que tu préfères.
</p>
</article>



</body>
</html>