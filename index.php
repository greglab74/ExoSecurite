<?php
require_once 'recaptcha/autoload.php';
if(isset($_POST['submitpost'])) {
if(isset($_POST['g-recaptcha-response'])) {
$recaptcha = new \ReCaptcha\ReCaptcha('6Lf-h3QUAAAAANaZqBrHvxaZLg0PpADjwhMxnMVF');
$resp = $recaptcha->setExpectedHostname('g-recaptcha-response')
                  ->verify($_POST['g-recaptcha-response']);
if ($resp->isSuccess()) {
    var_dump('Captcha Valide');
} else {
    $errors = $resp->getErrorCodes();
    var_dump('Captcha Invalide');
    var_dump($errors);
} }
else {
  var_dump('Captcha non rempli');
}
}
?>


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
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>



<div id="form-wrapper2">

<form id="forminscription" action="traitform.php" method="post" onSubmit="return validate()" >
  <h3>INSCRIPTION</h3>

<div class="input-wrap">
<label>Nom</label>
<input type="text" placeholder="Votre nom" name="nom" required>

</div>

<div class="input-wrap">
<label>Prenom</label>
<input type="text" placeholder="Votre prénom" name="prenom" required>

</div>

<div class="input-wrap">
<label>Votre Email</label>
<input type="email" placeholder="mail@host.com" name="email" required>

</div>

<div class="input-wrap">
<label>code postal</label>
<input pattern="[0-9]{5}" type="text" placeholder="Votre code postal" name="codepostal" required>

</div>

<div class="input-wrap">
<label>Password</label>
<input type="password" id="password1" placeholder="Votre mot de passe" name="motpasse" required>

</div>
<div class="input-wrap">
<label>confirmation du Password</label>
<input type="password" id="password2" placeholder="confirmer votre mot de passe" name="motpasse2" required>

</div>
<div class="g-recaptcha" data-sitekey="6Lf-h3QUAAAAAPH6jLStyLwOwWyQ32UBSYx8KP03"></div>
<input type="submit" value="Créer un compte" name="submitpost">
</form>

</div>

</body>
<script>
function validate() {

          var a = document.getElementById("password1").value;
          var b = document.getElementById("password2").value;

          if (a!=b) {
            alert("Les mots de passe ne correspondent pas.");
            return false; }
          else {

          }
        }
</script>
</html>
