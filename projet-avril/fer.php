<?php

$base = new PDO('mysql:host=localhost;dbname=projet-avril', 'root', '');


?>


<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   <title>Fer à béton</title>
    <?php
    require('header.php');  
    ?>
  
  <div class="article">
     <?php
    $req = $base->query("SELECT * FROM `articles` WHERE id_sous_categories=8");
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
              <form action="ajout.php" method="post">
                  <input type="number" name="quantite" value="1">
              </form>
              
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