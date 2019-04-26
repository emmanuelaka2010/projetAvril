
<?php

    $email = $password = $emailError = $passwordError ="";
    if(!empty($_POST)) {
        
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $base = new PDO('mysql:host=localhost;dbname=projet-avril', 'root', '');
        $req = $base->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $req->execute(array($email, $password));
        $result = $req->fetch();
        $count = $req->rowCount();
        
        if ($count >= 1){
            session_start();
            $_SESSION["nom"] = $result["nom"];
            header("Location: index.php");
            
        }
        else {
            $erreur = "Email ou mot de passe inexistant";
        }
    }

?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="image/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">MonSite</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Electricité
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="eclairage.php">Eclairage</a>
          <a class="dropdown-item" href="cable.php">Câble</a>
          <a class="dropdown-item" href="#">Coupe circuit</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Plomberie
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Robinet</a>
          <a class="dropdown-item" href="#">Joints</a>
          <a class="dropdown-item" href="#">Raccord</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Béton
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Fer à beton</a>
          <a class="dropdown-item" href="#">Bétonnière</a>
        </div>
      </li>
       <li nav-item>
          <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <?php
        if(isset($_SESSION['nom'])){
            
          echo '<li nav-item>';
              echo '<a class="nav-link" href="logout.php">Se déconnecter</a>';
          echo '</li>';
       }
        else{
            echo '<li nav-item>';
            echo '<a class="nav-link" href="inscription.php">S\'inscrire</a>';
            echo '</li>';
            echo '<li nav-item>';
            echo '<a class="nav-link" href="login.php">Se connecter</a>';
            echo  '</li>';
        }
        
        
    ?>
         
    </ul>
  </div>
</nav>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="image/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="login.php">
					<span class="login100-form-title">
						Identifiant
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez entrer un Email valide: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Veuiillez entrer votre mot de passe">
						<input class="input100" type="password" name="password" placeholder="Mot de passe">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Se connecter
						</button>
					</div>

					<div class="text-center p-t-12">
						
						<a class="txt2" href="#">
							Nom d'utilisateur / mot de passe oublié ?
						</a>
						<span class="txt1">
							oublié
						</span>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Créez votre compte
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="js/bootstrap.js"></script>
<!--===============================================================================================-->
	<script src="js/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>