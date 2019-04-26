<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
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
        <a class="nav-link" href="index.php">Accueil</a>
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
          <a class="dropdown-item" href="robinet.php">Robinet</a>
          <a class="dropdown-item" href="#">Joints</a>
          <a class="dropdown-item" href="#">Raccord</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Béton
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="fer.php">Fer à beton</a>
          <a class="dropdown-item" href="#">Bétonnière</a>
        </div>
      </li>
       <li nav-item>
          <a class="nav-link" href="contact.php">Contact</a>
      </li>
      <?php
            session_start();
        
        if(!empty($_SESSION["nom"])){
            
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