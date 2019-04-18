<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container col-xl-6 ">
        <a class="navbar-brand" href="index.php">
        <img src="/assets/img/CogipLogo.png" width="70" alt="logo entreprise Cogip">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?php if($url[0] == 'accueil'){echo "active";} ?>">
                    <a class="nav-link" href="../accueil/01"><i class="fa fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php if($url[0] == 'factures'){echo "active";} ?>">
                    <a class="nav-link" href="../factures/02"><i class="fa fa-file-o"></i> Factures</a>
                </li>
                <li class="nav-item <?php if($url[0] == 'company'){echo "active";}?>">
                    <a class="nav-link" href="../company/03"><i class="fa fa-building"></i> Sociétés</a>
                </li>
                <li class="nav-item <?php if($url[0] == 'contacts'){echo "active";} ?>">
                    <a class="nav-link" href="../contacts/04"><i class="fa fa-envelope-open"></i> Contact</a>
                </li>
                <?php
                if($_SESSION['auth']['level']=='godmode')
                {
                ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <a class="dropdown-item" href="../newContact/00">Nouveau contact</a>
                    <a class="dropdown-item" href="newfacture.php">Nouvelle facture</a>
                    <a class="dropdown-item" href="newSociete.php">Nouvelle société</a>
                    </div>
                </li>
                <?php
                }
                ?>
            </ul>
            <ul class="navbar-nav my-2">
                <li class="nav-item pr-5 text-white">
                    <strong><?= $_SESSION['auth']['first_name'].' '.$_SESSION['auth']['last_name'] ?></strong>
                </li>
            </ul>
            <?php
            if ($_SESSION['auth']) {
            ?>
            <form class="form-inline my-2 my-lg-0">
            <a href="../logout/08" class="btn btn-danger my-2 my-sm-0"><i class="fa fa-power-off"></i> LogOut</a>
            </form>
            <?php
            }else{
            ?>
            <form class="form-inline my-2 my-lg-0">
            <a href="../connexion/09" class="btn btn-warning my-2 my-sm-0"><i class="fa fa-power-off"></i> logIn</a>
            </form>
            <?php
            }
            ?>            
        </div>
    </div>
</nav>