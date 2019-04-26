<?php

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
        $adresseError = "L\'adresse ne peut être vide";
        $isSuccess = false;
    }
    if(!preg_match('/^([a-z0-9] )*$/i', $adresse)){
        $adresseError = "L\'adresse doit contenir que les lettres et les chiffres";
    }
    if(empty($phone)){
        $phoneError = "Veuillez entrer votre numéro de téléphone";
        $isSuccess = false;
    }
    if(preg_match('`[0-9]{8}`',$phone)){
        $phoneError = "Veuillez saisir que 8 chiffres";
        $isSuccess = false;
    }
    if(empty($email)){
        $emailError = "Veuillez entrer votre adresse Email";
        $isSuccess = false;
    }
    if(preg_match(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailError = "Veuillez entrer un Email correct";
        $isSuccess = false;
    }
       if(empty($password)){
        $emailError = "Veuillez entrer votre mot de passe";
        $isSuccess = false;
    }
    if(empty($cPassword)){
        $phoneError = "Veuillez confirmer votre mot de passe";
        $isSuccess = false;
    }
    
    if($password != $cPassword){
        $passwordError = "mot de passe non conforme";
        $cPasswordError = "mot de passe non conforme";
        $isSuccess = false;
    }
}


?>