<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container col-xl-6 ">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="accueil.php"><i class="fa fa-home"></i> Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="factures.php"><i class="fa fa-file-o"></i> Factures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pageSocietes.php"><i class="fa fa-building"></i> Sociétés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-envelope-open"></i> Contact</a>
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
                    <a class="dropdown-item" href="newContact.php">Nouveau contact</a>
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
            <form class="form-inline my-2 my-lg-0">
            <a href="logout.php" class="btn btn-danger my-2 my-sm-0"><i class="fa fa-power-off"></i></a>
            </form>
        </div>
    </div>
</nav>