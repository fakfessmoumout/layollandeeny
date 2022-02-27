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
	<h1>Tom-Maths:</h1>
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
	<a href="Exo.php">Exercices d'Entrainement</a>
	<br><br>
	<a href="Test.php">Tests / Evaluations</a>
	<br><br>
  <img src="jpg/tomath.jpg"height="300%" width="118.5%" align="right">
</ul>
</nav>

<article>
<p>
	Tu as fais le bon choix !
</p>
<p>
	Amuses-toi bien.. Mais n'oublie pas d'apprendre !
</p>
<p>
	En espèrant que cela t'aide.
	</p>
<p>
	Sinon n'hésite jamais à recommencer.
</p>
</article>

</body>
</html>