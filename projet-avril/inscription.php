
<?php

$base = new PDO('mysql:host=localhost;dbname=projet-avril', 'root', '');
$nom = $prenom = $adresse = $email = $phone = $password = $cPassword = $nomError = $prenomError = $adresseError = $emailError = $phoneError = $passwordError = $cPasswordError = "";
if(!empty($_POST)){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
    $genre = $_POST['genre'];
    $isSuccess = true;
    
    if(empty($nom)){
        $nomError = "Le nom ne peut être vide";
        $isSuccess = false;
    }
    if(!preg_match('/^([a-z0-9] )*$/i', $nom)){
        $nomError = "Le nom doit contenir que les lettres et les chiffres";
    }
    if(empty($prenom)){
        $prenomError = "Le prénom ne peut être vide";
        $isSuccess = false;
    }
    if(!preg_match('/^([a-z0-9] )*$/i', $prenom)){
        $prenomError = "Le prénom doit contenir que les lettres et les chiffres";
    }
    if(empty($adresse)){
        $adresseError = "L'adresse ne peut être vide";
        $isSuccess = false;
    }
    if(!preg_match('/^([a-z0-9] )*$/i', $adresse)){
        $adresseError = "L'adresse doit contenir que les lettres et les chiffres";
    }
    if(empty($phone)){
        $phoneError = "Veuillez entrer votre numéro de téléphone";
        $isSuccess = false;
    }
    if(!preg_match('`[0-9]{8}`',$phone)){
        $phoneError = "Veuillez saisir que 8 chiffres";
        $isSuccess = false;
    }
    if(empty($email)){
        $emailError = "Veuillez entrer votre adresse Email";
        $isSuccess = false;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailError = "Veuillez entrer un Email correct";
        $isSuccess = false;
    }
       if(empty($password)){
        $passwordError = "Veuillez entrer votre mot de passe";
        $isSuccess = false;
    }
    if(empty($cPassword)){
        $cPasswordError = "Veuillez confirmer votre mot de passe";
        $isSuccess = false;
    }
    
    if($password != $cPassword){
        $passwordError = "mot de passe non conforme";
        $cPasswordError = "mot de passe non conforme";
        $isSuccess = false;
    }
    if($isSuccess){
        $req = $base->prepare("INSERT INTO users (nom, prenom, adresse, genre, email, phone, password) values(?, ?, ?, ?, ?, ?, ?)");
        $req->execute(array($nom,$prenom,$adresse,$genre,$email,$phone,$password));
        header("Location: login.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Inscription</title>

    <link href="css/font-awesome.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="css/select2.min.css" rel="stylesheet" media="all">

    <link href="css/inscrit.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Formulaire d'inscription</h2>
                    <form action="inscription.php" method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Prénom</label>
                                    <input class="input--style-4" type="text" name="prenom" value="<?php echo $prenom ?>">
                                    <span class="red"><?php echo $prenomError; ?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Nom de famille</label>
                                    <input class="input--style-4" type="text" name="nom" value="<?php echo $nom ?>">
                                    <span class="red"><?php echo $nomError; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Adresse</label>
                                    <input class="input--style-4" type="text" name="adresse" value="<?php echo $adresse ?>">
                                    <span class="red"><?php echo $adresseError; ?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Genre</label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Masculin
                                            <input type="radio" checked="checked" name="genre">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Féminin
                                            <input type="radio" name="genre">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php echo $email ?>">
                                    <span class="red"><?php echo $emailError; ?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Numéro de téléphone</label>
                                    <input class="input--style-4" type="text" name="phone" value="<?php echo $phone ?>">
                                    <span class="red"><?php echo $phoneError; ?></span>
                                </div>
                            </div>
                        </div>
                           <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Mot de passe</label>
                                    <input class="input--style-4" type="password" name="password">
                                    <span class="red"><?php echo $passwordError; ?></span>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Confirmez votre mot de passe</label>
                                    <input class="input--style-4" type="password" name="cPassword">
                                    <span class="red"><?php echo $cPasswordError; ?></span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Soumettre</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/select2.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->