<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link rel="shortcut icon" type="image/x-icon" href="resource/img/favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/reset.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>EXO FORMULAIRE PHP</title>
</head>

<body>


<main>
  <?php

  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $email = $_POST["email"];
  $password = sha1($_POST["motpasse"]);
	$password2 = sha1($_POST["motpasse2"]);
  $codepostal= $_POST["codepostal"];


  $serveur = 'localhost';

  $login = 'root';

  $mot_de_passe = '1';

  $nom_bd = 'exoform';

  try {
      $conn = new PDO("mysql:host=$serveur;dbname=$nom_bd", $login, $mot_de_passe);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("SET CHARACTER SET utf8");








      //test de l'existence ou non de l'email
      $lienidutilisateur = $conn->query('SELECT ID_utilisateurs FROM utilisateurs WHERE email = "'.$email.'"');
      $lienid = $lienidutilisateur->fetch();
      $testutil = $lienid['ID_utilisateurs'];
      if (empty($testutil)) {
        //ajout dans la base si pas présent
        $sql1 = "INSERT INTO utilisateurs (nom, prenom, email, codepostal, password)
        VALUES ('$nom','$prenom','$email','$codepostal','$password')";
        $conn->exec($sql1);
        echo '<p class="modifphp">Votre compte a bien été créer !!! </p></br>';

        echo '<a class="modifphp" href="index.php">ou retour à la page d accueil </a>';
      }
      else {
            //message d'erreur si déja présent
            echo '<p class="modifphp">email déja utilisé. Réessayez avec un autre</p></br>';
      }



      }
  catch(PDOException $e)
      {

      echo $sql1 . "<br>" . $e->getMessage();
      }

  $conn = null;

  ?>
</main>

</body>
</html>
