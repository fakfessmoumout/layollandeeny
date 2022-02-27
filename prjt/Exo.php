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
	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.35" />
</head>
<body>
	<header>
	<h1>Exercices d'Entrainement :</h1>
</header>

<h2 class="p-5">Session : <?php echo $data['pseudo']; ?> !<a class="one" href="landing.php">-</a></h2>

  <nav>
  	<ul>
  	<a href="EducTom.php">Acceuil</a>
  	<br><br><br><br><br>
	<p3>Partie Théorique :</p3>
	<br><br>
	<a href="Lecons.php">Leçons</a>
	<br><br>
	<a href="qcm.php">QCM</a>
	<br><br><br><br><br>
	<p3>Partie Pratique :</p3>
  <br><br>
	<a href="Test.php">Tests / Evaluations</a>
    <br><br>
	<a href="Jeu.php">Jeu : Tom-Maths</a>
	<br><br>


</ul>
</nav>

<article>
<p>
	Encore toi !
</p>
<p>
	Bon alors passons aux Exercices.
</p>
<p>
	Si tu as du mal n'hésite pas à revenir en arrière ou recommencer !
</p>
<p>
	Sinon passe aux entrainements suivants.
</p>
</article>

</body>
</html>