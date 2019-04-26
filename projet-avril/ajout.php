<?php
$base = new PDO('mysql:host=localhost;dbname=projet-avril', 'root', '');
   if(!empty($_GET['id'])){
    $id = $_GET['id'];
}
if(!empty($_POST)){
    $quantite = $_POST['quantite'];
    $isSucces = true;
    if($isSucces){
        $req = $base->prepare("INSERT INTO ajouter (quantite, id_articles) values(?, ?)");
        $req->execute(array($quantite,$id));
        header("Location: ajouter_a.php?id=".$id );
    }
}


?>
