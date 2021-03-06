<?php

$base = new PDO('mysql:host=localhost;dbname=projet-avril', 'root', '');


?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--    style personnalisé-->
    <link rel="stylesheet" href="css/style.css">

    <title>Bienvenue !</title>
  </head>
  <body>
  <div class="header">
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
  </div>
  
  <div class="article">
     <?php
    $req = $base->query("SELECT * FROM `articles` WHERE id_sous_categories=2");
    while($articles = $req->fetch()){?>
      <div class="img_article">
          <a href="#">
              <img src="image/<?php echo $articles['photo'] ?>" alt="">
          </a>
      </div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Produit</th>
              <th scope="col">Description</th>
              <th scope="col">Prix (en F CFA)</th>
              <th scope="col">Quantité</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row"><?php echo utf8_encode($articles['nom_articles']) ?></th>
              <td><?php echo utf8_encode($articles['description']) ?></td>
              <td><?php echo $articles['prix'] ?></td>
              <td>
              <form action="ajouter_a.php" method="post"></form>
              <input type="number" id="quantite" value="1">
              </td>
            </tr>

          </tbody>
        </table>
  </div>
<!--  <div class="clear"></div>-->
  <a type="submit" href="ajouter_a.php?id=<?php echo $articles['id_articles'] ?>">Ajouter au panier</a>
   <?php } ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>