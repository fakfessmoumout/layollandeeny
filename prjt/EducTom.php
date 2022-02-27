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

<html lang="fr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EducTom</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="icon" type="icon/ico" href="file:///C:/Users/El%C3%A8ve/Desktop/Nouveau%20dossier%20(2)/icon.ico">


<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
  <h1>Educ-Tom :</h1>
</header>
          <h2 class="p-5">Bonjour <?php echo $data['pseudo']; ?> !<a class="one" href="landing.php">-</a></h2>
<section>
  <nav>
    <ul>
      <img src="png/tomath0.png" width="250px" height="250px" > 
      <br><br>
      <p0>Partie Théorique :</p0>
      <br><br>
      <a class="one"href="Lecons.php">Leçons</a>
      <br><br>
      <a class="one"href="qcm.php">QCM</a>
      <br><br><br><br><br>
      <p0>Partie Pratique :</p0>
      <br><br>
      <a class="one"href="Exo.php">Exercices d'Entrainement</a>
      <br><br>
      <a class="one"href="Test.php">Tests / Evaluations</a>
      <br><br>
      <a class="one"href="Jeu.php">Jeu Tom-Maths</a>
      <br><br>
      
  </ul>
  </nav>

<article>
  <h3>Bienvenue ! C'est moi à gauche, je suis Tom-Maths !</h3>
  <p>Je suis là pour t'apprendre les mathématiques par l'intermédiaire d'activiés amusantes.</p>
  <p>Tu peux retrouver sur nos différentes pages situées en dessous de moi:</p>
  <p>- Des Leçons,</p>
  <p>- Des QCM,</p>
  <p>- Des Exercices d'Entrainement,</p>
  <p>- Des Tests / Evaluations,</p>
  <p>- Un Mini-Jeu regroupant plusieurs exercices et quiz,</p>
  <p>Tout ceci va t'aider à réussir ton année ! </p>
</article>

<h4><a class="one" href="page.php">Commentaire :  </a></h4>


</section>

</body>
</html>