

<nav class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">☰</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php
            if (isset($_SESSION["administrateur"])) {
                echo '
      <li class="nav-item">
          <a class="nav-link active " aria-current="page" href="index.php?page=deconnexion">se deconnecter</a>
        </li>';
    } else {
        echo '<li><a class="nav-link active " aria-current="page" href="index.php?page=formulaire">Connexion</a></li>';
    }
    ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=miel">nos miels</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=apiculteur">notre apiculteur</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?page=acceuil">accueil</a>
        </li>
        <?php
            if (isset($_SESSION["administrateur"])) {
                echo '
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administration
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?page=ajouter_miel">ajouter un miel</a></li>
            <li><a class="dropdown-item" href="index.php?page=modif_miel">modifier un miel</a></li>
            <li><a class="dropdown-item" href="index.php?page=delete_miel">supprimer un miel</a></li>
          </ul>
        </li> ';
        
            }
            ?>
      </ul>
      <span class="navbar-text" >
        MIELUX
      </span>
    </div>
  </div>
</nav>